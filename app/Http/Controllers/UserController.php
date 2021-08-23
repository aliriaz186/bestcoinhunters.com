<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Coin;
use App\Models\Contest;
use App\Models\Earn;
use App\Models\PromotedCoin;
use App\Models\PromotePage;
use App\Models\Upvote;
use App\Models\User;
use App\Models\UserVerification;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use services\email_messages\InvitationMessageBody;
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;

class UserController extends Controller
{
    public function signup(Request $request){
        try {
            if (!empty($request->userEmail) && !empty($request->userName) && !empty($request->password)){
                if (strlen($request->userName) < 4 || strlen($request->userName) > 20){
                    return json_encode(['status' => false, 'message' => 'Username should not be less than 4 or greater than 20 characters']);
                }
                $user = new User();
                $user->email = $request->userEmail;
                $user->username = $request->userName;
                $user->password = md5($request->password);
                $user->save();
                $subject = new SendEmailService(new EmailSubject("Verification Code"));
                $mailTo = new EmailAddress($user->email);
                $message = new InvitationMessageBody();
                $code =  random_int(100000, 999999);
                $emailBody = $message->verificationCode($code);
                $body = new EmailBody($emailBody);
                $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
                $sendEmail = new EmailSender(new PhpMail(new MailConf(env("MAIL_HOST"), env("MAIL_USERNAME"), env("MAIL_PASSWORD"))));
                $result = $sendEmail->send($emailMessage);

                $userVerification = new UserVerification();
                $userVerification->user_id = $user->id;
                $userVerification->code = $code;
                $userVerification->save();
                return json_encode(['status' => true, 'message' => 'Success! Verification Code sent to your email.']);
            }else{
                return json_encode(['status' => false, 'message' => 'Invalid inputs']);
            }

        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Server Error, Please try again later']);
        }
    }

    public function welcome(Request $request){
        $coins = Coin::where('status',1)->OrderBy('upvotes', 'DESC')->get();
        $promoted = [];
        foreach ($coins as $coin){
            if (PromotedCoin::where('coin_id', $coin->id)->exists()){
                array_push($promoted, $coin);
            }
            $coin->launch_date = Carbon::parse($coin->launch_date)->diffForHumans();
            $coin->isUpvoted = 0;
            if (Upvote::where('coin_id', $coin->id)->where('ip', $request->ip())->exists()) {
                if (Upvote::where('coin_id', $coin->id)->where('ip', $request->ip())->whereDate('created_at', Carbon::today())->exists()) {
                    $coin->isUpvoted = 1;
                }
            }
        }
        return view('welcome')->with(['promoted' => $promoted]);
    }

    public function verifyCode(Request $request){
        try {
            if (!empty($request->userEmail)){
                if (UserVerification::where('code', $request->code)->exists()){
                   $userVerification = UserVerification::where('code', $request->code)->first();
                   $user = User::where('email', $request->userEmail)->where('id', $userVerification->user_id)->exists();
                   if ($user){
                       $userVerification = UserVerification::where('code', $request->code)->first();
                       $userVerification->verified = 1;
                       $userVerification->update();
                       return json_encode(['status' => true, 'message' => 'Verification Successfull! You can now login anytime.']);
                   }else{
                       return json_encode(['status' => false, 'message' => 'Invalid Code']);
                   }
                }else{
                    return json_encode(['status' => false, 'message' => 'Invalid Code']);
                }

            }else{
                return json_encode(['status' => false, 'message' => 'Invalid inputs']);
            }

        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Server Error, Please try again later']);
        }
    }




    public function login(Request $request){
        try {
            if (!empty($request->userEmail) && !empty($request->password)){
                if (User::where('email', $request->userEmail)->exists()){
                   $user = User::where('email', $request->userEmail)->first();
                   if (!UserVerification::where('user_id', $user->id)->where('verified', 1)->exists()){
                       return json_encode(['status' => false, 'message' => 'You are not verified.']);
                   }
                   if ($user->password == md5($request->password)){
                       $token = JWT::encode($user->id, 'secret-2021');
                       return json_encode(['status' => true, 'message' => 'Login Successfull', 'token' => $token]);
                   }else{
                       return json_encode(['status' => false, 'message' => 'Invalid Email or Password']);
                   }
                }else{
                    return json_encode(['status' => false, 'message' => 'Invalid Email or Password']);
                }

            }else{
                return json_encode(['status' => false, 'message' => 'Invalid inputs']);
            }

        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Server Error, Please try again later']);
        }
    }

    public function updateProfile(Request $request){
        try {
            $userId = JWT::decode($request->token, 'secret-2021', array('HS256'));
            if (User::where('id', $userId)->exists()){
                if (strlen($request->userName) < 4 || strlen($request->userName) > 20){
                    return json_encode(['status' => false, 'message' => 'Username should not be less than 4 or greater than 20 characters']);
                }
                $user = User::where('id', $userId)->first();
                $user->name = $request->name;
                $user->username = $request->userName;

                if ($request->hasfile('avatar')) {
                    $file = $request->file('avatar');
                        $extension = $file->getClientOriginalExtension();
                        if ($extension == 'png' || $extension == 'jpg'){
                            list($width, $height, $type, $attr) = getimagesize($file);
                            if ($width == 256 && $height == 256){
                                $name = rand(0, 1000) .time() . '.' . $file->getClientOriginalExtension();
                                $file->move(base_path('/data') . '/files/', $name);
                                $user->avatar = $name;
                            }else{
                                return json_encode(['status' => false, 'message' => 'Image dimension should 256 X 256']);
                            }

                        }else{
                            return json_encode(['status' => false, 'message' => 'Only image is allowed as avatar']);
                        }

                }
                $user->update();
                return json_encode(['status' => true, 'message' => 'Profile Updated']);
            }else{
                return json_encode(['status' => false, 'message' => 'Access Denied']);
            }

        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function searchCoins(Request $request){
        try {
            if ($request->search == -1){
                $coins = Coin::where('status',1)->OrderBy('upvotes', 'DESC')->offset($request->offset)->limit($request->limit)->get();

            }else{
                $coins = Coin::where('status',1)->where('name', 'like', '%' . $request->search . '%')->OrderBy('upvotes', 'DESC')->offset($request->offset)->limit($request->limit)->get();
            }
         foreach ($coins as $coin){
             $coin->launch_date = Carbon::parse( $coin->launch_date)->diffForHumans();
             $coin->isUpvoted = 0;
             if (Upvote::where('coin_id', $coin->id)->where('ip', $request->ip())->where('useragent', $request->useragent)->exists()) {
                 if (Upvote::where('coin_id', $coin->id)->where('ip', $request->ip())->where('useragent', $request->useragent)->whereDate('created_at', Carbon::today())->exists()){
                     $coin->isUpvoted = 1;
                 }
             }
         }
          return json_encode(['status' => true, 'data' => $coins]);

        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function blog(){
        return view('blog')->with(['blogs' => Blog::orderBy('id', 'DESC')->get()]);
    }

    public function viewBlogPic($id){
        $banner = Blog::where('id', $id)->first();
        $file =  base_path('/data') . '/files/' . $banner->file;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function upvote(Request $request){
        try {
            if (Upvote::where('coin_id', $request->id)->where('ip', $request->ip())->where('useragent', $request->useragent)->exists()) {
                if (Upvote::where('coin_id', $request->id)->where('ip', $request->ip())->where('useragent', $request->useragent)->whereDate('created_at', Carbon::today())->exists()){
                    return json_encode(['status' => false]);
                }
            }
            $coin = Coin::where('id', $request->id)->first();
            $coin->upvotes = (int)$coin->upvotes + 1;
            $coin->update();
            $upvote = new Upvote();
            $upvote->ip = $request->ip();
            $upvote->useragent = $request->useragent;
            $upvote->coin_id = $request->id;
            $upvote->save();
            return json_encode(['status' => true]);

        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function savecoin(Request $request){
        try {
            $coin = new Coin();
            $coin->name = $request->name;
            $coin->website = $request->website;
            $coin->symbol = $request->symbol;
            $coin->telegram = $request->telegram;
            $coin->description = $request->description;
            $coin->twitter = $request->twitter;
            $coin->discord = $request->discord;
            $coin->market_cap = $request->marketCap;
            $coin->price = $request->price;
            $coin->launch_date = $request->launchDate;
            $coin->reddit = $request->reddit;
            $coin->logo = $request->logo;
            $coin->information = $request->information;
            $coin->chain = $request->chain;
            $coin->address = $request->address;
            $coin->contact_email = $request->email;
            $coin->contact_telegram = $request->contactTelegram;
            $coin->save();
            return json_encode(['status' => true, 'message' => "Coin Added"]);
        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function earn(){

        return view('earn')->with(['earn' => Earn::where('id', 1)->first()]);
    }

    public function getCoin($id, Request $request){
        $coins = Coin::where('status',1)->OrderBy('upvotes', 'DESC')->get();
        $promoted = [];
        foreach ($coins as $coin){
            if (PromotedCoin::where('coin_id', $coin->id)->exists()){
                array_push($promoted, $coin);
            }
            $coin->launch_date = Carbon::parse($coin->launch_date)->diffForHumans();
            $coin->isUpvoted = 0;
            if (Upvote::where('coin_id', $coin->id)->where('ip', $request->ip())->exists()) {
                if (Upvote::where('coin_id', $coin->id)->where('ip', $request->ip())->whereDate('created_at', Carbon::today())->exists()) {
                    $coin->isUpvoted = 1;
                }
            }
        }

        $upVoted = 0;
        $currentCoin = Coin::where('id', $id)->first();
        if (Upvote::where('coin_id', $currentCoin->id)->where('ip', $request->ip())->exists()) {
            if (Upvote::where('coin_id', $currentCoin->id)->where('ip', $request->ip())->whereDate('created_at', Carbon::today())->exists()) {
                $upVoted = 1;
            }
        }
        return view('coin-details')->with(['coin' => Coin::where('id', $id)->first(), 'promoted' => $promoted, 'upVoted' => $upVoted]);
    }

    public function contest(){

        return view('contest')->with(['contest' => Contest::where('id', 1)->first()]);
    }

    public function promotestats(){

        return view('promotestats')->with(['promote' => PromotePage::where('id', 1)->first()]);
    }
}

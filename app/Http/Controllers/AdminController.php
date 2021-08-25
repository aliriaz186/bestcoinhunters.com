<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Coin;
use App\Models\Contest;
use App\Models\Earn;
use App\Models\PromotedCoin;
use App\Models\PromotePage;
use App\Models\Slide;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use services\email_messages\InvitationMessageBody;
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;

class AdminController extends Controller
{

    public function home(){
        if (Session::has('adminId')){
            return view('dashboard.home');
        }else{
            return redirect('admin-login');
        }
    }

    public function adminlogin(){
        return view('auth.login');
    }

    public function banners(){

        return view('dashboard.banners')->with(['bannersAll' => Banner::all()]);
    }


    public function promotion(){
        $coins = Coin::where('status', 1)->get();
        foreach ($coins as $coin){
           $coin->status =  PromotedCoin::where('coin_id', $coin->id)->exists();
        }
        return view('dashboard.promotion')->with(['coins' => $coins]);
    }

    public function slider(){
        $slides = Slide::all();
        return view('dashboard.slider')->with(['slides' => $slides]);
    }

    public function coins(){
        $coins = Coin::all();
        return view('dashboard.coins')->with(['coins' => $coins]);
    }

    public function adminloginPost(Request $request){
        try {
                if (Admin::where('email', $request->email)->where('password', $request->password)->exists()){
                    $user = Admin::where('email', $request->email)->where('password', $request->password)->first();
                    Session::put('adminId', $user->id);
                    return redirect('admin');
                }else{
                    return redirect()->back()->withErrors(['Invalid Email or Password']);
                }


        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function savebanners(Request $request){
        try {

            if ($request->hasfile('banner1')) {
                $banner = Banner::where('status', 1)->first();
                $file = $request->file('banner1');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $banner->banner = $name;
                $banner->update();
            }
            if ($request->hasfile('banner2')) {
                $banner = Banner::where('status', 2)->first();
                $file = $request->file('banner2');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $banner->banner = $name;
                $banner->update();
            }
            if ($request->hasfile('banner3')) {
                $banner = Banner::where('status', 3)->first();
                $file = $request->file('banner3');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $banner->banner = $name;
                $banner->update();
            }

            $banner = $banner = Banner::where('status', 1)->first();
            $banner->url = $request->url1;
            $banner->update();

            $banner = $banner = Banner::where('status', 2)->first();
            $banner->url = $request->url2;
            $banner->update();

            $banner = $banner = Banner::where('status', 3)->first();
            $banner->url = $request->url3;
            $banner->update();

            session()->flash('msg', 'Banner updated successfully!');
            return redirect()->back();


        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function uploadslide(Request $request){
        try {

            if ($request->hasfile('slide')) {
                $slide = new Slide();
                $file = $request->file('slide');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $slide->image = $name;
                $slide->save();
            }
            session()->flash('msg', 'Slide uploaded successfully!');
            return redirect()->back();


        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function promoteCoin($id){
        try {

           $coin = new PromotedCoin();
           $coin->coin_id = $id;
           $coin->save();
            session()->flash('msg', 'Coin Promoted successfully!');
            return redirect()->back();


        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function unpromoteCoin($id){
        try {
            PromotedCoin::where('coin_id',$id)->first()->delete();
            session()->flash('msg', 'Coin removed from Promoted!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function approveCoin($id){
        try {

           $coin = Coin::where('id', $id)->first();
           $coin->status = 1;
           $coin->update();
            session()->flash('msg', 'Approved successfully!');
            return redirect()->back();


        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function declineCoin($id){
        try {

            $coin = Coin::where('id', $id)->first();
            $coin->status = 2;
            $coin->update();
            session()->flash('msg', 'Declined successfully!');
            return redirect()->back();


        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function deleteSlide($id){
        try {

            Slide::where('id', $id)->first()->delete();
            session()->flash('msg', 'Slide deleted successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function logoutuser(){
        Session::flush();
        return redirect('admin');
    }

    public function getBanner($status){
        $banner = Banner::where('status', $status)->first();
        $file =  base_path('/data') . '/files/' . $banner->banner;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function deleteBlog($id){
        try {

            Blog::where('id', $id)->first()->delete();
            session()->flash('msg', 'Blog deleted successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function coinDetails($id){
        return view('dashboard.coin-details')->with(['coin' => Coin::where('id', $id)->first()]);
    }

    public function updateCoinInfo(Request $request){
        try {
            $coin = Coin::where('id', $request->id)->first();
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
            $coin->update();
            session()->flash('msg', 'Coin updated successfully!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function changepassword(){
        return view('dashboard.changepassword');
    }

    public function changepasswordpost(Request $request){
        try {
            if ($request->password != $request->conpassword){
                return redirect()->back()->withErrors(['Password mismatch']);
            }
            $admin = Admin::where('id', 1)->first();
            $admin->password = $request->password;
            $admin->update();
            session()->flash('msg', 'Password updated successfully!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }


    public function addsliderurl(Request $request){
        try {
           $slide = Slide::where('id', $request->slideId)->first();
            $slide->url = $request->url;
            $slide->update();
            session()->flash('msg', 'URL updated successfully!');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function getSlide($id){
        $banner = Slide::where('id', $id)->first();
        $file =  base_path('/data') . '/files/' . $banner->image;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }
    public function inviteUser(Request $request){
        try {
            if (!empty($request->userEmail)){
                $userEmail = $request->userEmail;
                $subject = new SendEmailService(new EmailSubject("Invitation Email"));
                $mailTo = new EmailAddress($userEmail);
                $message = new InvitationMessageBody();
                $encodedEmail = JWT::encode($userEmail, 'secret-2021');
                $url = url('') . '/signup/' .$encodedEmail;
                $emailBody = $message->invitationMessageBody($url);
                $body = new EmailBody($emailBody);
                $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
                $sendEmail = new EmailSender(new PhpMail(new MailConf(env("MAIL_HOST"), env("MAIL_USERNAME"), env("MAIL_PASSWORD"))));
                $result = $sendEmail->send($emailMessage);
                return json_encode(['status' => true, 'message' => 'Invitation Sent Successfully']);
            }else{
                return json_encode(['status' => false, 'message' => 'Invalid Email']);
            }

        }catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => 'Server Error, Please try again later']);
        }
    }

    public function earnpage(){
        return view('dashboard.earn')->with(['earn' => Earn::where('id', 1)->first()]);
    }

    public function contestpage(){
        return view('dashboard.contestpage')->with(['earn' => Contest::where('id', 1)->first()]);
    }

    public function promotepage(){
        return view('dashboard.promotepage')->with(['earn' => PromotePage::where('id', 1)->first()]);
    }

    public function saveearnpage(Request $request){
        try {

            $earn = Earn::where('id', 1)->first();
            $earn->heading = $request->heading;
            $earn->text1 = $request->text1;
            $earn->text2 = $request->text2;
            $earn->footer = $request->footer;
            $earn->update();
            session()->flash('msg', 'Content updated successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }

    }

    public function savecontestpage(Request $request){
        try {

            $earn = Contest::where('id', 1)->first();
            $earn->heading = $request->heading;
            $earn->place1 = $request->place1;
            $earn->place2 = $request->place2;
            $earn->place3 = $request->place3;
            $earn->place4 = $request->place4;
            $earn->footer = $request->footer;
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $earn->file = $name;
            }
            $earn->update();
            session()->flash('msg', 'Content updated successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }

    }

    public function getPromoteFile(){
        $banner = PromotePage::where('id', 1)->first();
        $file =  base_path('/data') . '/files/' . $banner->file;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function getContestFile(){
        $banner = Contest::where('id', 1)->first();
        $file =  base_path('/data') . '/files/' . $banner->file;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function savepromotepage(Request $request){
        try {
            $earn = PromotePage::where('id', 1)->first();
            $earn->heading = $request->heading;
            $earn->text1 = $request->text1;
            $earn->subheading = $request->subheading;
            $earn->heading2 = $request->heading2;
            $earn->promotedcoin = $request->promotedcoin;
            $earn->roratingbanner = $request->roratingbanner;
            $earn->wideheaderbanner = $request->wideheaderbanner;
            $earn->popupallpages = $request->popupallpages;
            $earn->footer = $request->footer;

            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $earn->file = $name;
            }
            $earn->update();
            session()->flash('msg', 'Content updated successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['Server Error, Please try again later']);
        }
    }

    public function saveblog(Request $request){
        try {
            $earn = new Blog();
            $earn->title = $request->title;
            $earn->description = $request->description;

            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('/data') . '/files/', $name);
                $earn->file = $name;
            }
            $earn->save();
            session()->flash('msg', 'Blog added successfully!');
            return redirect()->back();

        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function blogpage(){
        return view('dashboard.blogpage')->with(['blogs' => Blog::all()]);
    }


}

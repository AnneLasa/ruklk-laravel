<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Events\ProfileNewMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function getMessageFor($id){
        $logid= Auth::user()->id;
        $messages = Message::where('from', $id)->where('to', $logid)->orWhere('to',$id)->where('from', $logid)->get();

        return response()->json($messages);
    }

    public function send(Request $request){
        $message =Message::create([
            'from'=> auth()->id(),
            'to' => $request->receiver_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));
        return response()->json($message);
    }

    public function get(){
        $contacts = User::where('id','!=', auth()->id() )->get();

        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as message_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $contacts = $contacts->map(function ($contact) use($unreadIds){
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->message_count : 0;

            return $contact;
        });

        return response()->json($contacts);
    }

    public function getProfileMessagesFor($id){
       
        Message::where('from', $id)->where('to', auth()->id())->update(['read'=> true]);

        $message =Message::where(function($q) use($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use($id){
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })->get() ;

        return response()->json($message);
    }

    public function profilesend(Request $request){
        $message =Message::create([
            'from'=> auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        broadcast(new ProfileNewMessage($message));
        return response()->json($message);
    }
}

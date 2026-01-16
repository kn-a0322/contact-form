<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){//Request $requestは「なんでも受け入れる窓口」→ContactRequestに書き換えることで、バリデーションを突破したデータが送られてくる
        $contact = $request->only(['name', 'email', 'tel', 'content']);//リクエストからname, email, tel, contentのデータを取得して$contactに格納
        return view('confirm', compact('contact'));//コントローラーからビューにデータを渡す時にcontactというキーで渡す（compact関数）
        //confirm.blade.phpでは$contactという変数でデータを受け取ることができる
    }

    public function store(ContactRequest $request){//storeメソッドはデータを保存するメソッド
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);//Contactモデルのcreateメソッドを使用してデータを保存
        return view('thanks');
    }
}
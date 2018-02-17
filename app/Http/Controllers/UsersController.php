<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function index() {
        /*
            Ce se intampla?
            Modelul User va pregati o cerere bazei de date pentru toate elementele din tabelul 'users' (tabelul users este configurat in model) cu cateva conditii:
                1. modelul User vrea, in acest caz, doar coloanele 'name', 'id', 'email'
            Gata.
            Folosind metoda 'get' practic va depune cererea si va astepta pentru raspunsul pozitiv si lista de elemente.
            Urmeaza 'toArray' care este specific modelului si care va transforma raspunsul primit din baza de date intr-un array.
        */
	   	 $users = User::query()->select(["name","id","email"])->get()->toArray();
         
	    return view("template",[
            "content" => view('list',[   
                "allusers" => $users
            ])
	    	
	    ]);
	}
//CRUD, redirect, template cu acelasi styling, session (trimitem informatii intre pagini), accesam baza de date, Hash (criptat testat parole)
	public function update(Request $input, $edited_id) {
       
      //  $user = User::query()->select(["name","id","email"])->where('id','=',$edited_id)->get()->toArray();
        $user = User::query()->find($edited_id)->toArray();

        return view('template',[
            'content' => view('update',[
                "user" => $user
            ])
           
        ]);
 

    }

    public  function delete($remove_id) {
        User::query()->find($remove_id)->delete();
        return redirect('/users');
}

    /**
    */
    public function create(Request $input) {
        // instanta = obiect de tipul clasei X
        // Cream o instanta noua a modelului 'User'
        $user = new User();
        // pe modelul user avem cheile: 'id', 'name', 'password', 'reset_password', 'created_at', 'updated_at'
        //aci setam cheia name
        $user->name = $input->get('name');
        //aci setam cheia email
        $user->email = $input->get('email');
        //aci setam cheia password
        $user->password = Hash::make($input->get('password'));
        
        // dupa ce am setat cheile in instanta, trimitem cererea de a salva noul element in baza de date
        $user->save(); 

        // redirectionam catre pagina /users
	    return redirect('/users');
    }

    public function edit(Request $input, $edited_id) {
        $user = User::query()->find($edited_id);
        $user->name = $input->get('name');
        
        $user->email = $input->get('email');
         
        $user->password = $input->get('password');
         
        $user->save(); 


        return redirect('/users');
    }

    public function testpassword($testpassword_id){
        return view('template',[
                'content' =>view('testpassword', [
                    'userid' => $testpassword_id 
                ])
        ]);
    }

    public function test(Request $input, $user_id ) {
        $userpassword = User::query()->find($user_id)->password;
        $result = "no";
        

      
        if(Hash::check($input->get("passwordtext"),$userpassword)) {
             $result = "yes";  
        } 
        return redirect()->back()->with([
             'result' => $result,
             'inputvalue' => $input->get("passwordtext")
         ]);


    }   
}

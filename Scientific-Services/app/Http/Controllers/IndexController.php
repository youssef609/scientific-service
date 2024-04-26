<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class IndexController extends Controller
{
    public function index() { 
       
         
      return view('index') ;

    }

    
    public function show($index_id) { 
       
         if ($index_id==1) 
         {
           return view('login.show') ; 
         }
         
         elseif($index_id==2) 
          { 
             
            return view('signup-student.create') ;
          }

          elseif($index_id==3) 
          { 
             
            return view('signup-employee.create') ;
          }
       

    } 
       // signup student
    public function store(Request $request){ 
       
     
    
     
       
      $validatedData = $request->validate([
        'Name' => ['required','min:15','unique:students'],
        'Email' => ['required','min:15','unique:students'],
        'Id' => ['required','min:7','unique:students'],
        'Password' => ['required','min:8'],

      ]);

     
      
      $req =request()->all() ;
      
      
     
     $name= request()->Name ; 
     $email= request()->Email ; 
     $id= request()->Id ; 
     $password= request()->Password ;
     $hashed_pass = password_hash($password, PASSWORD_DEFAULT) ;
     $error_filed = array() ; 
    //  filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z-' ]*$/", $name) &&filter_var($id, FILTER_VALIDATE_INT)
     if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        
         $error_filed[] = 'email' ; 
     } 

      if(!preg_match("/^[a-zA-Z-' ]*$/", $name)) { 
       
        $error_filed[] = 'name' ; 
        
      }

      if(!filter_var($id, FILTER_VALIDATE_INT)) { 
       
        $error_filed[] = 'id' ; 
        
      }
      if(filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z-' ]*$/", $name) &&filter_var($id, FILTER_VALIDATE_INT)) 
     { 
      $student = new student ; 

      $student->name = $name ; 
 
      $student->email = $email ; 
      
      $student->id = $id ;  
 
 
      $student->password =  $hashed_pass ;   
    
      $student->save() ;
        
      
      return to_route('index.index') ;
       
    
      

  }else {
        
        return view ('signup-student.create', ['error_filed'=>$error_filed] ) ;
        
   }

   
    
  }

  public function create () { 
      
     
    return view('signup-student.create') ;
        
  }    
     



      
     
     
      
    
 }  

  
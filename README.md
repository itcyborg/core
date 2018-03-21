# core
core framework
##Create Routes
* cd to routes directory, open routes.php file
* add routes using:
    
    `<?php
     
     use Core\Router\Route;
     
     Route::get('', 'AboutController@hello');
     
     Route::get('hello/', 'AboutController@index');
     
     Route::get('help', 'AboutController@help');
     
     Route::post('file', 'AboutController@file');`
 
 ##Handle form data
 ### form submitted via GET/POST
 ` use Core\Requests\Request;`
 
 `...`
 
 `public function getData()`
      `{`
      
          $request = new Request(); //create a new request
                      
          //get the field value
          
          $request->fieldname;
      }
 `

 ### form with files submitted via POST
 
 `
    use Core\Requests\Request;`
    
    $f = $request->files('file', 'file1'); //get the files if any from the request using field names. Retrieves all the files mentioned
 
    $g = $request->file('file'); //get the file if any from the request using field name. Retrieves one file
            
    dump($f->file); //access the file
            
    dump($f->file->size); //get the file attributes
            
    dump($g->size); //get the file attributes. Attributes: name|tmp_name|size|type|error        `
 
    
    


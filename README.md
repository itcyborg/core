# core
core framework
## Create Routes
* cd to routes directory, open routes.php file
* add routes.
### How to add routes
   
    <?php
         
         use Core\Router\Route;
         
         Route::get('', 'AboutController@hello');
         
         Route::get('hello/', 'AboutController@index');
         
         Route::get('hello/{id}','AboutController@withParam');
         
         Route::get('help', 'AboutController@help');
         
         Route::post('file', 'AboutController@file');
         
         Route::get('test',function(){
            echo "this is a test";
         });
         
         Route::get('user/{id}',function($id){
            echo $id;
         });
    ?>
 
 ## Handle form data
 ### form submitted via GET/POST
    use Core\Requests\Request;
    ...
     public function getData()
          {
          
              $request = new Request(); //create a new request
                          
              //get the field value
              
              $request->fieldname;
          }
 

 ### form with files submitted via POST
 
 `
    use Core\Requests\Request;`
    
    $f = $request->files('file', 'file1'); //get the files if any from the request using field names. Retrieves all the files mentioned
 
    $g = $request->file('file'); //get the file if any from the request using field name. Retrieves one file
            
    dump($f->file); //access the file
            
    dump($f->file->size); //get the file attributes
            
    dump($g->size); //get the file attributes. Attributes: name|tmp_name|size|type|error        `
 
### File Uploads
    //to store files publicly
    
    
    use Core\Exceptions\ExceptionsHandler;
    
    use Core\Requests\Request;
    
    use Core\Storage\Storage; 
    
    ...
    
    $request = new Request();
    
    $f = $request->files('file', 'file1');//if multiple files uploaded
    
    //$f=$requst->file('file');//if only one file uploaded
    
    try {
    
        $storage=new Storage();
        
        //store files privately. 
        
        //Takes one or two params: $file,[$destinationDir|optional].
         
        //Only accessible via Storage methods: download(),getPrivate()
         
        $storage->put($f->file);
        
        //stores file publicly. Can be accessed as an asset
        
        $storage->store($file); 
        
        echo "file uploaded successfully";
        
    } catch (ExceptionsHandler $e) {
    
        //handle errors if any
        
        dd($e);
        
    }
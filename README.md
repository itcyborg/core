# Core

## Server
PHP 5.4 and above has an inbuilt server used for development. We can start this server by running.
`php server start` from the terminal 

core framework
### Create Routes
* cd to routes directory, open routes.php file
* add routes.
#### How to add routes
   
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

### Handle form data
#### Form submitted via GET/POST

    use Core\Requests\Request;
    ...
     public function getData()
          {
          
              $request = new Request(); //create a new request
                          
              //get the field value
              
              $request->fieldname;
          }
 

#### form with files submitted via POST
 
 `
    use Core\Requests\Request;`
    
    $f = $request->files('file', 'file1'); //get the files if any from the request using field names. Retrieves all the files mentioned
 
    $g = $request->file('file'); //get the file if any from the request using field name. Retrieves one file
            
    dump($f->file); //access the file
            
    dump($f->file->size); //get the file attributes
            
    dump($g->size); //get the file attributes. Attributes: name|tmp_name|size|type|error        `
 
#### File Uploads
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
    
### Migrations / Tables
#### Create Migrations | Tables 
From the terminal run

`php server make migration|table='name'`

* name : is the name of your migration

The migration will be created in `Database/Migrations` directory.

#### Edit the migration structure

    <?php 
        namespace App\Migrations;
      
        use Core\Database\SchemaBuilder\Schema;
      
        class test{
      
      
            public static function run($tablename)
            {
                $table = new Schema($tablename);
                $table->increments(); //autoincrement primary key
                ## add table fields here
                $table->varchar('name',15); 
                $table->build();
            }
        }
  
#### Run the migrations
To execute the migrations, run
 
`php server migrate`

### Controllers
Instead of defining all of your request handling logic as Closures in route files, you may wish to organize this behavior using Controller classes. Controllers can group related request handling logic into a single class. Controllers are stored in the `App/Controllers` directory.

#### Creating Controllers
A basic controller can be created using the terminal 

`php server make controller='name'`

This creates a basic controller in the App/Controllers directory with the filename 'name';

### Load assets
`asset('name');`

### Load Views
#### Basic View
`view('viewname')`

#### Passing values to a view
`view('viewname',['key'=>'value',...])`

#### Accessing values from the view
    <article>
        {{name}}
        {id}
        [title]
    </article> 
    
**Use of placeholders only works if the values are not arrays/objects**

    <article>
        <?php
            ##handle arrays/objects here
        ?>
    </article>

**Arrays/objects can be accessed as above. More simpler solutions are coming soon**

#### Views location
Views are stored in the `App\Views` directory and have a .php extension.

### Configurations
#### Introduction
Configuration details such as api keys/ SMTP settings/ Database setting are best stored in a config.ini file located in `Config/` directory. 

#### Storing new configuration
    [mail] ## specifies the name of the configuration. i.e 'mail' for mail settings 
    smtp_server=smtp.mail.com
    port=443
    username=user
    password=password
    
#### Accessing the configurations
The configuration can be accessed by using the Config class

    use Core\Config\Config;
    //lets get the database settings
    Config::database(); ## access it statically
    //access it dynamically
    $config=new Config;
    dd($config->database());
    
## Scheduling Tasks
To create a task:
* In windows:
    php server make task=taskname
* In Linux:
    php server make job=jobname


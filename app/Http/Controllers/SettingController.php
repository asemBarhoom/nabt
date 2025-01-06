<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Setting;
use App\Rules\ValidMobile;
use App\Rules\ValidUrl;
use App\Models\SystemAdmin;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function index()
    {
        $page=[];
        $conf=Setting::all();
        foreach ($conf as $c){
            $page[$c->name]=$c->value;
        }
        return view('system_admin.settings.index',compact('page'));
    }
    public function add(Request $request)
    {

        $this->validate($request,[
            'mobile'=>['required'],
            'email'=>'required|email',
//            'currency_ar'=>'required',
//            'currency_en'=>'required',
//            'facebook'=>['required'/*,new ValidUrl(),new ValidFaceBook()*/],
//            'twitter'=>['required'/*,new ValidUrl(),new ValidTwitter()*/],
//            'snapchat'=>['required'/*,new ValidUrl(),new SnapchatRule()*/],
            'instagram'=>['required'/*,new ValidUrl(),new SnapchatRule()*/],
            'whatsapp'=>['required'/*,new ValidUrl(),new SnapchatRule()*/],
//            'ios'=>['required',new ValidUrl()],
//            'android'=>['required',new ValidUrl()],
        ]);

        $data= $request->all();

        @$data['logo'] = $request->logo ? $request->logo : '';

        \HELPER::deleteUnUsedFile([$request->logo]);


        if (!$request->stop_app)
        {
            $data['stop_app'] = 'off';
        }
     if (!$request->auto_update)
        {
            $data['auto_update'] = 'off';
        }


         foreach ($data as $name=>$value){
             if (!in_array($value,['_token','days']))
                 Setting::updateOrCreate([
                     'name' => $name
                 ], [
                     'name' => $name,
                     'value' => $value
                 ]);
        }

        flash('تم التعديل بنجاح');
         return redirect(route('system.settings.index'));
    }

    public function getNotifications(Request $request)
    {
        if($request->only_count == 1){
//            $count=AdminNotification::where('seen',0)->count();
            $count=0;

            return ['done'=>1,'count'=>$count,'items'=>""];
        }else{
//            $all=AdminNotification::query()->whereNotNull('not_data')->orderBy('id','desc')->get();
//            $items="";
//            foreach($all as $a){
//                $seen=$a->seen == 0?'primary':'warning';
//                $link="#";
//
//
//                if($a->not_data){
//                    $data = json_decode($a->not_data);
//                    if(isset($data->order_id)){
//                        $link=route('system.orders.details',$data->order_id);
//
//                    }else{
//                        $link='#';
//                    }
//                }
//                $items.='
//            <div class="d-flex align-items-center mb-6">
//
//                <div class="symbol symbol-40 symbol-light-'.$seen.' mr-5">
//                    <span class="symbol-label">
//                        <img src="'.asset('media/svg/icons/Home/Library.svg').'" alt="">
//                    </span>
//                </div>
//                <div class="d-flex flex-column font-weight-bold">
//                    <a href="'.$link.'" class="text-dark text-hover-primary mb-1 font-size-lg">'.$a->text.'</a>
//                    <span class="text-muted">'.$a->created_at->diffForHumans().'</span>
//                </div>
//            </div>';
//
//
//            }


//            AdminNotification::where('seen',0)->update(['seen'=>1]);
//            return ['done'=>1,'count'=>0,'items'=>$items];
        }


    }


    public function system_settings()
    {
        return view('system_admin.settings.actions');
    }

    public function exportDB(Request  $request)
    {
        $host = config('database.connections.mysql.host');
        $username = config('database.connections.mysql.username');
        $password =config('database.connections.mysql.password');
        $database_name = config('database.connections.mysql.database');
        $conn = mysqli_connect($host, $username, $password, $database_name);
        $conn->set_charset("utf8");


// Get All Table Names From the Database
        $tables = array();
        $sql = "SHOW TABLES";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }

        $sqlScript = "";
        foreach ($tables as $table) {

            // Prepare SQLscript for creating table structure
            $query = "SHOW CREATE TABLE $table";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);

            $sqlScript .= "\n\nDROP TABLE IF EXISTS `$table`;";
            $sqlScript .= "\n" . $row[1] . ";\n\n";


            $query = "SELECT * FROM $table";
            $result = mysqli_query($conn, $query);

            $columnCount = mysqli_num_fields($result);

            // Prepare SQLscript for dumping data for each table
            for ($i = 0; $i < $columnCount; $i ++) {
                while ($row = mysqli_fetch_row($result)) {
                    $sqlScript .= "INSERT INTO $table VALUES(";
                    for ($j = 0; $j < $columnCount; $j ++) {
                        $row[$j] = $row[$j];

                        if (isset($row[$j])) {
                            if(is_numeric($row[$j])){
                                $sqlScript .= $row[$j] ;

                            }elseif(is_null($row[$j])){
                                $sqlScript .= "NULL" ;

                            }else{
                                $sqlScript .= "'" . $row[$j] . "'";

                            }
                        } else {
                            $sqlScript .= "NULL";
                        }
                        if ($j < ($columnCount - 1)) {
                            $sqlScript .= ',';
                        }
                    }
                    $sqlScript .= ");\n";
                }
            }

            $sqlScript .= "\n";
        }

        if(!empty($sqlScript)) {
            $base=base_path();
            $dir0=$base.'/public/db_back';
            $dir=date('Y');
            $dir2=date('M');
            $dir3=date('d');
            if( is_dir($dir0) === false )
            {
                mkdir($dir0);
            }
            if( is_dir($dir0.'/'.$dir) === false )
            {
                mkdir($dir0.'/'.$dir);
            }
            if( is_dir($dir0.'/'.$dir. '/'.$dir2) === false )
            {
                mkdir($dir0.'/'.$dir. '/'.$dir2);
            }
            if( is_dir($dir0.'/'.$dir. '/'.$dir2. '/'.$dir3) === false )
            {
                mkdir($dir0.'/'.$dir. '/'.$dir2. '/'.$dir3);
            }
            // Save the SQL script to a backup file
            $backup_file_name = $database_name . '_backup' . '.sql';
            $fileHandler = fopen($dir0 . '/'.$dir . '/'.$dir2 . '/'.$dir3 . '/'.$backup_file_name, 'w+');
            $number_of_lines = fwrite($fileHandler, $sqlScript);
            fclose($fileHandler);
            return response()->download($dir0 . '/'.$dir . '/'.$dir2 . '/'.$dir3 . '/'.$backup_file_name);

        }
    }

    public function trancateDB(Request  $request)
    {



        $tableNames = \Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        $except=['areas','balance_types','cases','countries ',
            'govs','image_types','languages','ltm_translations',
            'migrations','notifications_texts','pages',
            'payment_types','rules','settings','system_admins'];
        foreach ($tableNames as $name){
            if (in_array($name, $except, true)) {
                continue;
            }

            \DB::table($name)->truncate();

        }
        foreach (Setting::all() as $c){
            if($c->show_edit){
                $c->value='';
                $c->save();
            }
        }
        foreach (Page::all() as $c){
            $c->text_ar='';
            $c->text_en='';
            $c->save();

        }
        SystemAdmin::where('id','<>',1)->delete();
        foreach (config('menu_aside.items') as $item){
            if(isset($item['module_name']) && isset($item['title'])){
                $has_multi=0;
                if(is_array($item['module_name'])){
                    $has_multi=1;
                    $where=collect($item['module_name'])->map(function ($item){
                        return strtolower(trim($item));
                    });
                }else{
                    $where=[strtolower(trim($item['module_name']))];
                }
                foreach ($where as $w){
                    if($n=Module::where('name',$w)->first()){
                        if($has_multi){
                            $n->nameAr=$item['title'].'-'.$w;

                        }else{
                            $n->nameAr=$item['title'];
                        }
                        $n->save();
                    }else{
                        $n=new Module();
                        $n->name=$w;
                        if($has_multi){
                            $n->nameAr=$item['title'].'-'.$w;

                        }else{
                            $n->nameAr=$item['title'];
                        }
                        $n->save();
                    }
                }

            }


        }
        flash('تم تفريغ قاعدة البيانات بنجاح');
        return back();
    }

}

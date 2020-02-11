<?php
    namespace App\Http\Controllers\Admin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Notification;    
    use DB;

    class NotificationController extends Controller {            

        public function get_notification(){                       
            $role_id = Auth::guard('web')->user()->role_id;
            $user_id = Auth::guard('web')->user()->id;
            $query = Notification::where('status', '0')->orderBy('created_at', 'desc'); 
            if($role_id != 1){
                $query->where('receive_id', $role_id) ;
            } else {
                $query-> where('panel_to', 'admin') ;
            } 
            $notices = $query->limit(7)->get();
            // echo $notices; exit ;
            $count = count($notices) ; 
            $html = ''; 
            $base_url = URL::to('/');  
            if($count > 0) {  
                foreach($notices as $k=> $value){
                    $color = '#0000FF';
                    if(strpos($value['heading'], "Assigned") !== false){
                        $color = '#ff00ff';
                    } 
                    if(strpos($value['heading'], "Ready") !== false){
                        $color = '#701f28';
                    } 
                    if(strpos($value['heading'], "Initiated") !== false){
                        $color = '#FFA500';
                    }  
                    if(strpos($value['heading'], "Delivered") !== false){
                        $color = '#008000';
                    } 
                    if(strpos($value['heading'], "Cancelled") !== false || strpos($value['heading'], "Rejected") !== false){
                        $color = '#FF0000'; 
                    } 
                    $html .= '<a href="'.$base_url.'/admin/all-notification-list">
                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                        <div class="mail-contnet">
                            <h5 style="color:'.$color.'">'.$value['heading'].'</h5> 
                            <span class="mail-desc">'.substr($value['description'], 0, 30).'...</span>
                            <span class="time">'.date("d/m/Y h:i A", strtotime($value['created_at'])).'</span> 
                        </div>
                    </a>';
                }
            }  
            $return = array('count' => $count, 'html' => $html) ;
            echo json_encode($return); exit;
         }
    }
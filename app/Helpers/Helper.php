<?php 
namespace App\Helpers;

class Helper {
    public static function user($users)
    {
        $html = '';
        foreach ($users as $key => $user) {    
            $stt = $key + 1;
            if($user->sex == 1){
                $sex = 'Nam';
            } else {
                $sex = 'Nữ';
            }
            $birdthday = date("d/m/Y", strtotime($user->birthday));
            $html .= 
            '
            <tr class="table_tr">
            <td data-label="STT">'.$stt.'</td>
            <td data-label="MSSV">'.$user->studentcode.'</td>
            <td data-label="Họ và tên">'.$user->fullname.'</td>
            <td data-label="Giới tính">'.$sex.'</td>
            <td data-label="Ngày sinh">'.$birdthday.'</td>
            <td data-label="Lớp">'.$user->class.'</td>
            <td data-label="Khóa">'.$user->course.'</td>
            <td id="none_before">
              <a href="/admin/managemember/view/'.$user->id.'">
                <i class="fa-solid fa-eye icon_action icon_action_view"></i>
              </a>
              <a href="/admin/managemember/edit/'.$user->id.'">
                <i class="fa-solid fa-pen-to-square icon_action icon_action_edit"></i>
              </a>  
              <a href="#" onclick="removeRow('.$user->id.', \'/admin/managemember/destroy\')">
                <i class="fa-solid fa-trash-can icon_action icon_action_delete"></i>
              </a>
            </td>
          </tr>
            ';
            unset($users[$key]);
            $html .= self::user($users);
            return $html; 
        }
    }
}
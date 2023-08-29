<?php
session_start();
$sess_ip_hist = "$_SERVER[HTTP_USER_AGENT]";
$u_agent = "okhttp";
$pattern_ip_hist = '/' . $u_agent . '/';
if (preg_match($pattern_ip_hist, $sess_ip_hist)) {
include_once($_SERVER['DOCUMENT_ROOT']."/class/conexao.php");
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
$id_token = mysqli_real_escape_string($conn, $_GET["update"]);
if (mysqli_real_escape_string($conn, $_GET["token"]) != "") {
  $id_token = mysqli_real_escape_string($conn, $_GET["token"]);
}
if ($id_token != "") {
  $id_token = $id_token;
} else {
  echo '<center><h1>TEMA PROTEGIDO BY <a href="https://t.me/ConfigMods">@ConfigMods</a></h1></center>';
  exit;
}

$result_produtos_login = "SELECT * FROM usuario WHERE token LIKE '$id_token'";
$resultado_produtos_login = mysqli_query($conn, $result_produtos_login);
while ($row_produto_login = mysqli_fetch_assoc($resultado_produtos_login)) {
  $db_user_id_up = $row_produto_login['id'];
}
$result_produtos2 = "SELECT * FROM app_config WHERE user_id LIKE '$db_user_id_up' LIMIT 100";
$resultado_produtos2 = mysqli_query($conn, $result_produtos2);
while ($row_produto2 = mysqli_fetch_assoc($resultado_produtos2)) {

  $user_id = $row_produto2['user_id'];
  $app_name = $row_produto2['app_name'];
  $background_color = $row_produto2['background_color'];
  $app_logo = $row_produto2['app_logo'];
  $card_color = $row_produto2['card_color'];
  $text_color = $row_produto2['text_color'];
  $button_color = $row_produto2['button_color'];
  $icon_color = $row_produto2['icon_color'];
  $border_color = $row_produto2['border_color'];
  $logo_height = $row_produto2['logo_height'];
  $logo_width = $row_produto2['logo_width'];
  $app_conta_link = $row_produto2['app_conta_link'];
  $app_dialog_config_background_color = $row_produto2['app_dialog_config_background_color'];
  $app_qsTileIcon = $row_produto2['app_qsTileIcon'];
  $app_dialog_success_text_color = $row_produto2['app_dialog_success_text_color'];
  $app_dialog_error_text_color = $row_produto2['app_dialog_error_text_color'];
  $app_message_text = $row_produto2['app_message_text'];
  $app_text_check_user = $row_produto2['app_text_check_user'];
  $app_message_type = $row_produto2['app_message_type'];
  $app_dialog_image_success = $row_produto2['app_dialog_image_success'];
  $app_dialog_image_fail = $row_produto2['app_dialog_image_fail'];
  $app_dialog_image_validate = $row_produto2['app_dialog_image_validate'];
  $app_dialog_image_message = $row_produto2['app_dialog_image_message'];
  $app_dialog_image_limit_exceeded = $row_produto2['app_dialog_image_limit_exceeded'];
  $app_dialog_image_invalid_data = $row_produto2['app_dialog_image_invalid_data'];
  $app_limiter_is_active = $row_produto2['app_limiter_is_active'];
  $show_config_mode = $row_produto2['show_config_mode'];
  $app_contact_link = $row_produto2['app_contact_link'];
  $app_contact_icon = $row_produto2['app_contact_icon'];
  $app_background_image = $row_produto2['app_background_image'];
  $app_config_item_background_color = $row_produto2['app_config_item_background_color'];
  $app_dialog_success_background_color = $row_produto2['app_dialog_success_background_color'];
  $app_dialog_error_background_color = $row_produto2['app_dialog_error_background_color'];
}

if ($user_id == "") {
  $user_id = "8278";
} else {
  $user_id = $user_id;
}
if ($app_contact_icon == "") {
  $app_contact_icon = "";
} else {
  $app_contact_icon = $app_contact_icon;
}
if ($app_contact_link == "") {
  $app_contact_link = "";
} else {
  $app_contact_link = $app_contact_link;
}
if ($show_config_mode == "") {
  $show_config_mode = "1";
} else {
  $show_config_mode = $show_config_mode;
}
if ($app_limiter_is_active == "") {
  $app_limiter_is_active = "1";
} else {
  $app_limiter_is_active = $app_limiter_is_active;
}
if ($app_dialog_image_invalid_data == "") {
  $app_dialog_image_invalid_data = "";
} else {
  $app_dialog_image_invalid_data = $app_dialog_image_invalid_data;
}
if ($app_dialog_image_limit_exceeded == "") {
  $app_dialog_image_limit_exceeded = "";
} else {
  $app_dialog_image_limit_exceeded = $app_dialog_image_limit_exceeded;
}
if ($app_dialog_image_message == "") {
  $app_dialog_image_message = "";
} else {
  $app_dialog_image_message = $app_dialog_image_message;
}
if ($app_dialog_image_validate == "") {
  $app_dialog_image_validate = "";
} else {
  $app_dialog_image_validate = $app_dialog_image_validate;
}
if ($app_dialog_image_fail == "") {
  $app_dialog_image_fail = "";
} else {
  $app_dialog_image_fail = $app_dialog_image_fail;
}
if ($app_dialog_image_success == "") {
  $app_dialog_image_success = "";
} else {
  $app_dialog_image_success = $app_dialog_image_success;
}
if ($app_message_type == "") {
  $app_message_type = "1";
} else {
  $app_message_type = $app_message_type;
}
if ($app_text_check_user == "") {
  $app_text_check_user = "";
} else {
  $app_text_check_user = $app_text_check_user;
}
if ($app_message_text == "") {
  $app_message_text = "";
} else {
  $app_message_text = $app_message_text;
}
if ($app_dialog_error_text_color == "#ff0000") {
  $app_dialog_error_text_color = "";
} else {
  $app_dialog_error_text_color = $app_dialog_error_text_color;
  if (strlen($app_dialog_error_text_color) == 7 || strlen($app_dialog_error_text_color) == 9) {
    $app_dialog_error_text_color = $app_dialog_error_text_color;
  } else {
    $app_dialog_error_text_color = "#ff0000";
  }
}
if ($app_dialog_success_text_color == "") {
  $app_dialog_success_text_color = "#11ff00";
} else {
  $app_dialog_success_text_color = $app_dialog_success_text_color;
  if (strlen($app_dialog_success_text_color) == 7 || strlen($app_dialog_success_text_color) == 9) {
    $app_dialog_success_text_color = $app_dialog_success_text_color;
  } else {
    $app_dialog_success_text_color = "#11ff00";
  }
}
if ($app_qsTileIcon == "") {
  $app_qsTileIcon = "";
} else {
  $app_qsTileIcon = $app_qsTileIcon;
}
if ($app_name == "") {
  $app_name = "";
} else {
  $app_name = $app_name;
}
if ($background_color == "") {
  $background_color = "#6d6d6d";
} else {
  $background_color = $background_color;
  if (strlen($background_color) == 7 || strlen($background_color) == 9) {
    $background_color = $background_color;
  } else {
    $background_color = "#6d6d6d";
  }
}
if ($app_background_image == "") {
  $app_background_image = "";
} else {
  $app_background_image = $app_background_image;
  $background_color = "#00000000";
}
if ($app_logo == "") {
  $app_logo = "";
} else {
  $app_logo = $app_logo;
}
if ($card_color == "") {
  $card_color = "#797979";
} else {
  $card_color = $card_color;
  if (strlen($card_color) == 7 || strlen($card_color) == 9) {
    $card_color = $card_color;
  } else {
    $card_color = "#797979";
  }
}
if ($text_color == "") {
  $text_color = "#ffffff";
} else {
  $text_color = $text_color;
  if (strlen($text_color) == 7 || strlen($text_color) == 9) {
    $text_color = $text_color;
  } else {
    $text_color = "#ffffff";
  }
}
if ($button_color == "") {
  $button_color = "#6d6d6d";
} else {
  $button_color = $button_color;
  if (strlen($button_color) == 7 || strlen($button_color) == 9) {
    $button_color = $button_color;
  } else {
    $button_color = "#6d6d6d";
  }
}
if ($icon_color == "") {
  $icon_color = "#ffffff";
} else {
  $icon_color = $icon_color;
  if (strlen($icon_color) == 7 || strlen($icon_color) == 9) {
    $icon_color = $icon_color;
  } else {
    $icon_color = "#ffffff";
  }
}
if ($border_color == "") {
  $border_color = "#6d6d6d";
} else {
  $border_color = $border_color;
  if (strlen($border_color) == 7 || strlen($border_color) == 9) {
    $border_color = $border_color;
  } else {
    $border_color = "#6d6d6d";
  }
}
if ($logo_height == "") {
  $logo_height = "150";
} else {
  $logo_height = $logo_height;
}
if ($logo_width == "") {
  $logo_width = "150";
} else {
  $logo_width = $logo_width;
}
if ($app_conta_link == "") {
  $app_conta_link = "";
} else {
  $app_conta_link = $app_conta_link;
}
if ($app_dialog_config_background_color == "") {
  $app_dialog_config_background_color = "#6d6d6d";
} else {
  $app_dialog_config_background_color = $app_dialog_config_background_color;
  if (strlen($app_dialog_config_background_color) == 7 || strlen($app_dialog_config_background_color) == 9) {
    $app_dialog_config_background_color = $app_dialog_config_background_color;
  } else {
    $app_dialog_config_background_color = "#6d6d6d";
  }
}
if ($app_config_item_background_color == "") {
  $app_config_item_background_color = "#6d6d6d";
} else {
  $app_config_item_background_color = $app_config_item_background_color;
  if (strlen($app_config_item_background_color) == 7 || strlen($app_config_item_background_color) == 9) {
    $app_config_item_background_color = $app_config_item_background_color;
  } else {
    $app_config_item_background_color = "#6d6d6d";
  }
}
if ($app_dialog_success_background_color == "") {
  $app_dialog_success_background_color = "#6d6d6d";
} else {
  $app_dialog_success_background_color = $app_dialog_success_background_color;
  if (strlen($app_dialog_success_background_color) == 7 || strlen($app_dialog_success_background_color) == 9) {
    $app_dialog_success_background_color = $app_dialog_success_background_color;
  } else {
    $app_dialog_success_background_color = "#6d6d6d";
  }
}
if ($app_dialog_error_background_color == "") {
  $app_dialog_error_background_color = "#6d6d6d";
} else {
  $app_dialog_error_background_color = $app_dialog_error_background_color;
  if (strlen($app_dialog_error_background_color) == 7 || strlen($app_dialog_error_background_color) == 9) {
    $app_dialog_error_background_color = $app_dialog_error_background_color;
  } else {
    $app_dialog_error_background_color = "#6d6d6d";
  }
}


echo '{
  "status": 200,
  "data": [
    {
      "user_id": '.$user_id.',
      "value": "'.$app_name.'",
      "id": 37,
      "name": "app_name"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_background_image.'",
      "id": 2163,
      "name": "app_background_image"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_logo.'",
      "id": 2386,
      "name": "app_logo"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$background_color.'",
      "id": 2165,
      "name": "background_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$card_color.'",
      "id": 39,
      "name": "card_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$text_color.'",
      "id": 40,
      "name": "text_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$button_color.'",
      "id": 41,
      "name": "button_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$icon_color.'",
      "id": 42,
      "name": "icon_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$border_color.'",
      "id": 556,
      "name": "border_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$logo_height.'",
      "id": 557,
      "name": "logo_height"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$logo_width.'",
      "id": 558,
      "name": "logo_width"
    },
    {
      "user_id": '.$user_id.',
      "value": "#00000000",
      "id": 390,
      "name": "card_color_logo"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$card_color.'",
      "id": 391,
      "name": "registro_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$card_color.'",
      "id": 392,
      "name": "status_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$border_color.'",
      "id": 2382,
      "name": "border_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$logo_height.'",
      "id": 2383,
      "name": "logo_height"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$logo_width.'",
      "id": 2384,
      "name": "logo_width"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_config_background_color.'",
      "id": 3134,
      "name": "app_dialog_config_background_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_config_item_background_color.'",
      "id": 3135,
      "name": "app_config_item_background_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_success_background_color.'",
      "id": 3136,
      "name": "app_dialog_success_background_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_error_background_color.'",
      "id": 3137,
      "name": "app_dialog_error_background_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_success_text_color.'",
      "id": 5139,
      "name": "app_dialog_success_text_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_error_text_color.'",
      "id": 5140,
      "name": "app_dialog_error_text_color"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_image_success.'",
      "id": 5143,
      "name": "app_dialog_image_success"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_limiter_is_active.'",
      "id": 2224,
      "name": "app_limiter_is_active"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$show_config_mode.'",
      "id": 2244,
      "name": "show_config_mode"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_image_fail.'",
      "id": 5144,
      "name": "app_dialog_image_fail"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_image_validate.'",
      "id": 5145,
      "name": "app_dialog_image_validate"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_image_message.'",
      "id": 5146,
      "name": "app_dialog_image_message"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_image_limit_exceeded.'",
      "id": 5147,
      "name": "app_dialog_image_limit_exceeded"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_dialog_image_invalid_data.'",
      "id": 5148,
      "name": "app_dialog_image_invalid_data"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_conta_link.'",
      "id": 2385,
      "name": "app_conta_link"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_message_text.'",
      "id": 5141,
      "name": "app_message_text"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_message_type.'",
      "id": 5142,
      "name": "app_message_type"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_qsTileIcon.'",
      "id": 5130,
      "name": "app_qsTileIcon"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_contact_link.'",
      "id": 2224,
      "name": "app_contact_link"
    },
    {
      "user_id": '.$user_id.',
      "value": "'.$app_contact_icon.'",
      "id": 7732,
      "name": "app_contact_icon"
    }]}';
} else {
  echo '<center><h1>TEMA PROTEGIDO BY <i><a href="https://t.me/ConfigMods">@ConfigMods</a></i></h1></center>';
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form method="post" >
<div style="width: 100%;">
<textarea name='texto' style="width: 45%;" rows="7"></textarea>

  <button name="encriptar"> Encriptar</button>
  <button name="descriptar"> Descriptar</button>
  </div>
  </form>
</body>
</html>

<?php


$caracter = array(
  'a' => 'liberdade,', 
  'b' => 'l iberdade,', 
  'c' => 'lib erdade,', 
  'd' => 'libe rdade,', 
  'e' => 'li ber da de,', 
  'f' => 'liber dade,', 
  'g' => 'liber dade,', 
  'h' => 'liberd ade,', 
  'i' => 'liberda de,', 
  'j' => 'liberdad e,', 
  'k' => 'liberdade ,', 
  'l' => 'l-iberdade,', 
  'm' => 'li-berdade,', 
  'n' => 'lib-erdade,', 
  'o' => 'libe-rdade,', 
  'p' => 'liber-dade,', 
  'q' => 'liberd-ade,', 
  'r' => 'liberda-de,', 
  's' => 'liberdad-e,', 
  't' => 'liberdade-,', 
  'u' => 'l.iberdade,', 
  'v' => 'li.berdade,', 
  'x' => 'lib.erdade,', 
  'y' => 'libe.rdade,', 
  'w' => 'liber.dade,', 
  'z' => 'liberd.ade,', 
  '0' => 'liberda.de,', 
  '1' => 'liberdad.e,', 
  '2' => 'liberdade.,', 
  '3' => 'l_iberdade,', 
  '4' => 'li_berdade,', 
  '5' => 'lib_erdade,', 
  '6' => 'libe_rdade,', 
  '7' => 'liber_dade,', 
  '8' => 'liberd_ade,', 
  '9' => 'liberda_de,', 
  '@' => 'liberdad_e,', 
  '#' => 'liberdade_,', 
  '!' => 'l+iberdade,', 
  '$' => 'li+berdade,', 
  '%' => 'lib+erdade,', 
  '¨' => 'libe+rdade,', 
  '&' => 'liber+dade,', 
  '*' => 'liberd+ade,', 
  '(' => 'liberda+de,', 
  ')' => 'liberdad+e,', 
  '_' => 'liberdade+,', 
  '+' => 'l  iberdade,', 
  '=' => 'li  berdade,', 
  '-' => 'lib  erdade,', 
  '§' => 'libe  rdade,', 
  '/' => 'liber  dade,', 
  '*' => 'liberd  ade,', 
  '|' => 'liberda  de,', 
  ' ' => 'li ber dade,', 
  'min' => '_liberdade_,', 
  'mai' => '.liberdade.,', 
  'esp' => '-liberdade-,', 
  'num' => '+liberdade+,', 
);


function encriptar($texto){
  $crypt = '';
  for ($i=0; $i < strlen($texto) ; $i++) { 
    global $caracter;
if(ctype_upper($texto[$i])){
  $crypt .= $caracter['mai'];
  $crypt .=$caracter[strtolower($texto[$i])];
}else if (array_key_exists($texto[$i],$caracter)){
  $crypt .= $caracter[$texto[$i]];
}
  }

  return $crypt;
}
function descriptar($texto){
  $decrypt =[];
  global $caracter;
$crptarray = array_reverse(explode(',', $texto));
  array_shift(($crptarray));
  $cont = 1;
foreach ($crptarray as $key => $value) {
  if($value =='.liberdade.'){
     
    $decrypt[$key-$cont] = mb_strtoupper ($decrypt[$key-$cont],"utf-8" );
     
    $cont++;
  } else{
   array_push($decrypt,array_flip($caracter)[$value.',']);
  }
   
  
}
 return implode(array_reverse($decrypt));

}

//descriptar(encriptar('Adriano de Barbosa Jesus'));
if(isset($_POST['encriptar'])){

echo  "<textarea id='textocriptografado'  style='width: 45%;' rows='7' disabled>".encriptar($_POST['texto'])."</textarea>";
} else if(isset($_POST['descriptar'])){
  echo  "<textarea id='textodescriptografado'  style='width: 45%;' rows='7' disabled>".descriptar($_POST['texto'])."</textarea>";

}
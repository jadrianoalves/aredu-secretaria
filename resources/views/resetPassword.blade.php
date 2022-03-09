<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{URL::asset('/api/change-password')}}" method="POST">
      <input type="text" name="token" value="{{ $token }}">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" id="email" name="email" class="form-control" value="{{$email}}">
      </div>
 
      <div class="form-group">
        <label for="passowd">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      
      <div class="form-group">
        <label for="re-enter-passowrd">Password</label>
        <input type="password" id="re-enter-passowrd" name="re-enter-passowrd" class="form-control" placeholder="Password">
      </div>
 
     
 
      <button type="submit" class="btn btn-default">Enviar</button>
 
    </form>
</body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @foreach (\SleepingOwl\Admin\AssetManager\AssetManager::styles() as $style)
      <link media="all" type="text/css" rel="stylesheet" href="{{ $style }}">
    @endforeach

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="/admin">{{ $pageTitle }}</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">{{ Lang::get('admin::lang.auth.title') }}</p>
        {!! Form::open(['url' => $loginPostUrl]) !!}
        <fieldset>
          <div class="form-group <?php echo $errors->has('username') ? 'has-error' : ''?>">
            {!! $errors->first('username', Form::label('username', ':message', ['class' => 'control-label'])) !!}
            {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' =>
            Lang::get('admin::lang.auth.username'), 'autofocus']) !!}
          </div>
          <div class="form-group <?php echo $errors->has('password') ? 'has-error' : ''?>">
            {!! $errors->first('password', Form::label('password', ':message', ['class' => 'control-label'])) !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>
            Lang::get('admin::lang.auth.password')]) !!}
          </div>
          {!! Form::button(Lang::get('admin::lang.auth.login'), ['class' => 'btn btn-lg btn-success btn-block', 'type' => 'submit']) !!}
        </fieldset>
        {!! Form::close() !!}
      </div>
    </div>
    @foreach (\SleepingOwl\Admin\AssetManager\AssetManager::scripts() as $script)
      <script src="{{ $script }}"></script>
    @endforeach
  </body>
</html>
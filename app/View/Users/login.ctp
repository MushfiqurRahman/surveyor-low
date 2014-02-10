<!-- BEGIN LOGIN FORM -->
    <?php echo $this->Form->create('User',array('type' => 'post','action' => 'login', 'class' => 'form-vertical login-form'));?>
    <!--<form class="form-vertical login-form" action="index.html" />-->
      <h3 class="form-title">Login to your account</h3>
      <div class="control-group">
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <!--<input class="m-wrap" type="text" placeholder="Username" />-->
            <?php echo $this->Form->input('email',array('type' => 'text', 'class' => 'm-wrap', 'placeholder' => 'Email', 'label' => false));?>
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-lock"></i>
<!--            <input class="m-wrap" type="password" style="" placeholder="Password" />-->
            <?php echo $this->Form->input('password',array('type' => 'password', 'class' => 'm-wrap','label' => false,'placeholder' => 'Password'));?>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <label class="checkbox">
        <input type="checkbox" /> Remember me
        </label>
        <a href="index.html" id="login-btn" class="btn green pull-right">
        Login <i class="m-icon-swapright m-icon-white"></i>
        </a>    
          <?php // echo $this->Form->end('Login',array('class' => 'btn green pull-right'));
          echo $this->Form->end();?>
      </div>
    <!-- END LOGIN FORM -->   
    
<script>
    $(document).ready(function(){
        $("#login-btn").click(function(e){
            e.preventDefault();
            $("#UserLoginForm").submit();
        });
    });
</script>
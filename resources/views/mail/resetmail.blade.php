<h3 style="text-align: center;color: green;">
  Reset Password Mail
</h3>
<p><i>Hey {{$customData['user']->fullname()}},</i></p> 
<h4>You have requested to reset your password, click the link below to reset password</h4>
<h6>valid for 30 minutes</h6>
<a type="button" href="https://selbolt.com?{{$customData['verification_code']}}" target="_blank">click here to reset password</a>
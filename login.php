<form method="post">
  <table class="loginTable">
     <tr>
      <th>ADMIN PANEL LOGIN</th>
     </tr>
     <tr>
      <td>
        <label class="firstLabel">Username:</label>
        <input type="text" name="username" id="username" value="" autocomplete="off" />
      </td>
     </tr>
     <tr>
      <td><label>Password:</label>
        <input type="password" name="password" id="password" value="" autocomplete="off" /></td>
     </tr>
     <tr>
      <td>
         <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" />
         <span class="loginMsg"><?php echo @$msg;?></span>
      </td>
     </tr>
  </table>
</form>

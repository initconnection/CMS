<form action="<?=ABSOLUTE_PATH?>main/login" method="POST">
    <label for="username"><?=_("Username")?>:</label>
    <input type="text" name="username" id="username" /><br />
    <label for="password"><?=_("Password")?>:</label>
    <input type="text" name="password" id="password"/><br />
    <input type="submit" value="<?=_("Log in")?>" />
</form>
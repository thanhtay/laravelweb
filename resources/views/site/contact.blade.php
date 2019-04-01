<?php
?>
<form action="{{route('siteContact')}}" method="post" accept-charset="utf-8">
    @csrf
    <input type="text" name="name" value="<?= $request->name?>">
    <textarea name="message"><?= $request->message?></textarea>
    <button type="submit">Send</button>
</form>

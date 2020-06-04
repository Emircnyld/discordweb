<?php

$invitelink = "INVITE-LINK"; // PASTE YOUR SERVER INVITE LINK
$serverid = "SERVERID"; // PASTE YOUR SERVER ID
$token = "BOT-TOKEN"; // PASTE YOUR BOT TOKEN


$members = json_decode(file_get_contents('https://discordapp.com/api/guilds/'.$serverid.'/widget.json'), true)['members'];
$membersCount = 0;
foreach ($members as $member) {
    if ($member['status'] == 'online' OR $member['status'] == 'dnd' OR $member['status'] == 'idle') {
        $membersCount++;
    }
}
$veri_cek = [
  "http" => [
    "method" => "GET",
    "header" => "Authorization: Bot ".$token.""
  ]
];



$json_context = stream_context_create($veri_cek);


$users     = file_get_contents('https://discordapp.com/api/guilds/'.$serverid.'/members?limit=1000', false, $json_context);

$infos     = file_get_contents('https://discordapp.com/api/guilds/'.$serverid.'', false, $json_context);

$counter  = json_decode($users, true);

$svname  = json_decode($infos, false);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Discordweb</title>
  </head>
  <body>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Server Name</th>
      <th scope="col">Active Users</th>
      <th scope="col">Server Location</th>
      <th scope="col">Invite Link</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">    <?php echo '<img src="https://cdn.discordapp.com/icons/'.$serverid.'/'; echo $svname->icon; echo '"class="" alt="Sunucu Icon" width="30px" heigh="30px">'; ?></th>
      <td><?php echo $svname->name; ?></td>
      <td><?php echo $membersCount; ?> / <?php echo count($counter); ?> </td>
      <td style="text-transform: capitalize;"><?php echo $svname->region; ?></td>
      <td><a href="<?php echo $invitelink ?>">Connect</a></td>
    </tr>
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
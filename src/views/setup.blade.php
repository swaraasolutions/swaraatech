<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laravel - Spaces Setup</title>
</head>
<body>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Panel heading without title</div>
        <div class="panel-body">
            <div class="row">
                <div class="col">
                    <form method="post" action="{{route("setup.post")}}">
                        <div class="form-group">
                            <label for="imagepath">Enter Image Path</label>
                            <input type="text" class="form-control" id="imagepath" placeholder="Full Path"
                                   name="imagepath"
                                   aria-describedby="imagepathhelp" required>
                            <small id="imagepathhelp" class="form-text text-muted"><em>Please enter image path which you
                                    want to track e.g. /home/swaraatech/images/</em></small>
                        </div>
                        <div class="form-group">
                            <label for="httppath">Enter HTTP Path for the location</label>
                            <input type="text" class="form-control" id="httppath"
                                   placeholder="Enter http path exluding domain name" name="httppath"
                                   aria-describedby="httppathhelp">
                            <small id="httppathhelp" class="form-text text-muted">Please enter image path which you want
                                to track e.g. if http path exists for the file please provide it so it can be changed
                                with spaces
                            </small>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="frequency">Frequency of Check</label>
                                    <select class="form-control" id="frequency" aria-describedby="frequencyhelp">
                                        <option value="1" selected>Daily</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Monthly</option>
                                        <option value="4">Yearly</option>
                                    </select>
                                    <small id="frequencyhelp" class="form-text text-muted">Select the frequency when you
                                        want to perform the check
                                    </small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="runtime">Frequency of Check</label>
                                    <input class="form-control" type="time" name="runtime" id="runtime" aria-describedby="runtimehelp">
                                    <small id="runtimehelp" class="form-text text-muted">Enter the time when the check will be performed</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>
<body>



<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">League Table</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th colspan="9">
                                    League Table | Week{{isset($week) ? $week : ''}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>
                                    Teams
                                </th>
                                <th>
                                    PTS
                                </th>
                                <th>
                                    P
                                </th>
                                <th>
                                    W
                                </th>
                                <th>
                                    D
                                </th>
                                <th>
                                    L
                                </th>
                                <th>
                                    GF
                                </th>
                                <th>
                                    GA
                                </th>
                                <th>
                                    GD
                                </th>

                            </tr>
                                @foreach($teams as $team)
                                    <tr>
                                <td>
                                    {{$team->name}}
                                </td>
                                    <td>
                                        {{$team->points}}
                                    </td>
                                    <td>
                                        {{$team->plays}}
                                    </td>
                                    <td>
                                        {{$team->win}}
                                    </td>
                                    <td>
                                        {{$team->draws}}
                                    </td>
                                    <td>
                                        {{$team->losts}}
                                    </td>
                                        <td>
                                           {{$team->gf}}
                                        </td>
                                        <td>
                                            {{$team->ga}}
                                        </td>
                                        <td>
                                            {{$team->gf - $team->ga}}
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @if($week < 6)
                        <a href="{{url('/play')}}"><button class="btn btn-primary"> Next Week</button></a>
                            @else
                            <a href="{{url('/start')}}"><button class="btn btn-success"> New Game</button></a>
                        @endif

                    </div>

                    <div class="col-lg-3">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th colspan="5">
                                    Match Result
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                            </tr>

                            @foreach($weekResults as $weekResult)
                                <tr>
                                    <td>{{\App\Team::find($weekResult->home)->name}}</td>
                                    <td>{{$weekResult->homescore}}</td>
                                    <td> - </td>
                                    <td>{{\App\Team::find($weekResult->away)->name}}</td>
                                    <td>{{$weekResult->awayscore}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-3">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>

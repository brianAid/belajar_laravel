<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One To Many</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="text-center my-4">Eloquent One To Many Relationship</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul Article</th>
                            <th>Tag</th>
                            <th width="15%" class="text-center">Jumlah Tag</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artikel as $a)
                            <tr>
                                <td>{{ $a->judul }}</td>
                                <td>
                                    @forelse($a->tags as $t)
                                        {{$t->tag}},
                                    @empty
                                        -
                                    @endforelse
                                </td>
                                <td class="text-center">{{ $a->tags->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
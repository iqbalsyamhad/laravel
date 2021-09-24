@extends('layouts.main')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Judul</th>
            <th scope="col">Konten</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($articles as $data) {
            ?>
            <tr>
                <th><?= $data->name ?></th>
                <td><?= $data->content ?></td>
                <td>
                    <form action="/article/{{ $data->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button>Delete Article</button>
                    </form>
                    <form action="/article/edit/{{ $data->id }}" method="GET">
                        {{ csrf_field() }}

                        <button>Edit Article</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
@endsection
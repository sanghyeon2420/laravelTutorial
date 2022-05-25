@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>게시판</h2>
        <div class="text-right">
            <button type="button" class="btn btn-outline-primary">
                <a href="{{ route('board.create') }}">
                    글쓰기
                </a>
            </button>
        </div>
        <table class="table table-hover mt-4" id="boardData">
            <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">작성자</th>
                <th scope="col">제목</th>
                <th scope="col">조회수</th>
                <th scope="col">작성일자</th>
                <th class="text-center" scope="col">상세보기</th>
            </tr>
            </thead>
            <tbody>
            @forelse($boards as $board)
                <tr>
                    <td>{{$board->id}}</td>
                    <td>{{$board->writer}}</td>
                    <td>{{$board->subject}}</td>
                    <td>{{$board->hit}}</td>
                    <td>{{$board->created_at}}</td>
                    <td class="text-center"><a href="{{route('board.detail',['id'=>$board->id])}}"><i
                                class="fa-regular fa-rectangle-list"></i></a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">데이터가 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <!--    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js" ></script>-->
    <!--    <script src="/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" ></script>-->

    <script src="/pages/board/list.init.js"></script>
    <script type="text/javascript">
        var routes = {
//            data: "{!! route('board.data') !!}",
            create: "{!! route('board.create') !!}",
           // detail: "{!! route('board.detail', ['id' => '']) !!}",
        };

    </script>
@endsection

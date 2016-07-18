@extends('backend.layout')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Dashboard</h3>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            First Row. First Column
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            First Row. Second Column
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="heading_b uk-margin-bottom">Dynamic Grid</h3>
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-margin-large-bottom hierarchical_show" data-uk-grid="{gutter: 20}">
                <div>
                    <div class="md-card">
                        <div class="md-card-content">Ad pariatur nemo voluptatem qui et eum voluptatem unde consectetur distinctio et ea adipisci consequatur minima quos non modi et.</div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">Repellat temporibus soluta consequatur ex est veniam ipsum itaque accusamus molestiae similique pariatur nihil dolor voluptas a sit molestias at incidunt necessitatibus quia cumque sed consequatur pariatur adipisci quibusdam dolorum nemo et ut sed consequatur cupiditate est architecto rerum voluptatem ut.</div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">Consequatur praesentium ea velit eveniet in delectus nulla rem sint fugit et ducimus unde laborum et id non quasi libero omnis enim minima.</div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">Illo dicta dolor non sint cupiditate cupiditate occaecati et modi repellendus aperiam quod rerum quia est molestias consequuntur et deserunt.</div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">Similique impedit alias quia placeat perferendis odit veniam suscipit aut reprehenderit possimus facere sint ab ut adipisci laudantium et incidunt ea et aliquam molestias in molestias neque.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
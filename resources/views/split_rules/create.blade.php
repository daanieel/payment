@extends('payment::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Criar um Recipient</b></div>
                    <div class="panel-body">
                        @include('payment::layouts.message_session')
                        <p>
                            Você está criando uma Split Rule nova, fique atento com os dados aqui inseridos!
                        </p>
                        @include('payment::layouts.form.error')
                        <form action="{{route('company.split-rules.store', $company->id)}}" method="POST">
                            @include('payment::split_rules.form')
                            <div class="col-md-12 text-center">
                                <button id="register" type="submit" class="btn btn-primary">Criar Split Rule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            const max_fields = 10;
            const wrapper = $(".input_fields_wrap");
            const add_button = $(".add_field_button");
            let x = 1;

            $(add_button).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                      '<div class="form-row">\n' +
                        '        <div class="form-group col-md-6">\n' +
                        '            <label for="recipient_id" class="control-label">Selecione uma \'Recipient\'</label>\n' +
                        '            <select class="form-control" name="recipients[]">\n' +
                        '                @foreach($company->recipients as $recipient)\n' +
                        '                    <option value="{{$recipient->id}}">\n' +
                        '                        {{$recipient->name}}\n' +
                        '                    </option>\n' +
                        '                @endforeach\n' +
                        '            </select>\n' +
                        '        </div>\n' +
                        '        <div class="form-group col-md-4">\n' +
                        '            <label for="percentage" class="control-label">Porcentagem</label>\n' +
                        '            <input name="percentage[]" type="text" placeholder="20" value="" class="form-control">\n' +
                        '        </div>\n' +
                        '        <div class="form-group col-md-2" style="margin-top: 27px;">\n' +
                        '            <button type="button" class="btn btn-danger remove_field">Remover</button>\n' +
                        '        </div>\n' +
                        '    </div>'
                    );
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                x--;
            })
        });
    </script>
@endsection

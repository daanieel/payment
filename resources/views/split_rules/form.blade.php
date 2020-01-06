@csrf
<input type="hidden" name="company_id" value="{{$company->id}}">
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="name" class="control-label">Nome completo</label>
        <input name="name" type="text" id="name" placeholder="Lucas Henrique"
               value="{{ old('name') ?? $splitRule->name }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="description" class="control-label">Descrição</label>
        <textarea name="description" id="description"
                  placeholder="Recebedor vinculado com a conta da empresa tal..." class="form-control">{{ old('description') ?? $splitRule->description }}</textarea>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group"><hr>
        <h4>Dados dos recebedores</h4>
        <div class="alert alert-warning" role="alert">
            O primeiro recebedor cadastrado será responsabilizado pelos riscos de chargeback da transação e será cobrado
            pelas taxas da transação. Fique atento a soma das porcentagens dos 'Recipients' precisa resultar em 100.
            E só use números inteiros. Você pode adicionar até 10 'Recipients':
            <button class="add_field_button btn btn-success btn-sm">Add 'Recipient'</button>
        </div>
    </div>
</div>

<div class="input_fields_wrap">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="recipient_id" class="control-label">Selecione uma 'Recipient'</label>
            <select class="form-control" name="recipients[]">
                @foreach($company->recipients as $recipient)
                    <option value="{{$recipient->id}}">
                        {{$recipient->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="percentage" class="control-label">Porcentagem</label>
            <input name="percentage[]" type="text" placeholder="20" value="" class="form-control">
        </div>
        <div class="form-group col-md-2" style="margin-top: 27px;">
            <button type="button" class="btn btn-danger remove_field">Remover</button>
        </div>
    </div>
</div>



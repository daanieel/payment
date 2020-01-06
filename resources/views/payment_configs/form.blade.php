@csrf
<input type="hidden" name="company_id" value="{{$company->id}}">
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="name" class="control-label">Nome</label>
        <input name="name" type="text" id="name" placeholder="Padrão"
               value="{{ old('name') ?? $paymentConfig->name }}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="description" class="control-label">Descrição</label>
        <input name="description" type="text" id="description" placeholder="Config padrão de mercado"
               value="{{ old('description') ?? $paymentConfig->description }}" class="form-control">
    </div>
</div>

<div class="col-md-12">
    <div class="alert alert-warning" role="alert">
        Os valores a baixo, são os valores que serão cobrados caso tenha um atraso no pagamento de alguma cobrança.
        O <b>Tipo</b> é se haverã uma cobrança de multa de atraso, essa multa pode ser uma valor ou uma porcentagem
        da cobrança (o padrão de mercado é 10% do valor da cobrança). <b>Valor ou a Porcentagem</b> Nesse você coloca
        o valor ou a porcentagem cobrada na multa de atraso. <b>Mora diária</b> é a multa diária que sera somada ao valor
        final (O padrão de mercado é 0,33% dia).
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="late_payment_type" class="control-label">Tipo</label>
        <select class="form-control" name="late_payment_type" id="late_payment_type">
            <option value="percent" {{ old('late_payment_type') == "percent" ? 'selected' : '' }}>Porcentagem</option>
            <option value="amount" {{ old('late_payment_type') == "amount" ? 'selected' : '' }}>Valor</option>
        </select>
    </div>
    <div class="form-group col-md-4 late_payment" id="late_payment_amount" style="display: none">
        <label for="late_payment_amount" class="control-label">Valor</label>
        <input name="late_payment_amount" type="text"  placeholder="10,00"
               value="{{ old('late_payment_amount') ?? $paymentConfig->late_payment_amount }}" class="form-control money">
    </div>
    <div class="form-group col-md-4 late_payment" id="late_payment_percent">
        <label for="late_payment_percent" class="control-label">Porcentagem</label>
        <input name="late_payment_percent" type="text" placeholder="10%"
               value="{{ old('late_payment_percent') ?? $paymentConfig->late_payment_percent }}" class="form-control percent">
    </div>
    <div class="form-group col-md-4">
        <label for="late_payment_daily_interest" class="control-label">Mora diária</label>
        <input name="late_payment_daily_interest" type="text" id="late_payment_daily_interest" placeholder="0,33"
               value="{{ old('late_payment_daily_interest') ?? $paymentConfig->late_payment_daily_interest }}" class="form-control percent">
    </div>
</div>

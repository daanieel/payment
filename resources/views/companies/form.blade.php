@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="legal_name" class="control-label">Razão Social</label>
        <input name="legal_name" type="text" id="legal_name" value="{{ old('legal_name') ?? $company->legal_name }}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="name" class="control-label">Nome fantasia</label> <input
            placeholder="Espaço de dança - Primeiros passos" name="name" type="text" id="name" value="{{ old('name') ?? $company->name }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="cnpj" class="control-label">CNPJ</label>
        <input placeholder="01.555.123/0001-01" name="cnpj" type="text" id="cnpj" value="{{ old('cnpj') ?? $company->cnpj }}" class="form-control mask-cnpj" maxlength="18">
    </div>
    <div class="form-group col-md-6">
        <label for="phone" class="control-label">Telefone</label>
        <input placeholder="(11) 4444-5555" name="phone" type="text" id="phone" value="{{ old('phone') ?? $company->phone }}" class="form-control mask-phone" maxlength="14">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="site" class="control-label">Site</label>
        <input placeholder="http://company.com" name="site" type="text" id="site" value="{{ old('site') ?? $company->site }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="main_payment_setup" class="control-label">Selecione uma 'Payment Config'</label>
        <select class="form-control" name="main_payment_setup">
            @foreach($company->paymentConfigs as $paymentConfig)
                <option value="{{$paymentConfig->id}}" {{ old('main_payment_setup') ?? $company->main_payment_setup == $paymentConfig->id ? 'selected' : '' }}>
                    {{$paymentConfig->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="main_split_rule_setup" class="control-label">Selecione uma 'Split Rule'</label>
        <select class="form-control" name="main_split_rule_setup">
            @foreach($company->splitRules as $splitRules)
                <option value="{{$splitRules->id}}" {{ old('main_split_rule_setup') ?? $company->main_split_rule_setup == $splitRules->id ? 'selected' : '' }}>
                    {{$splitRules->name}}
                </option>
            @endforeach
        </select>
    </div>
</div>

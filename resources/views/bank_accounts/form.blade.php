@csrf
<input type="hidden" name="company_id" value="{{$company->id}}">
<div class="form-row">
    <div class="col-md-4">
        <label for="bank_code" class="control-label">Código do banco</label>
        <input name="bank_code" type="text" id="bank_code" placeholder="245"
               value="{{ old('bank_code') ?? $bankAccount->bank_code }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="office_number" class="control-label">Agência</label>
        <input name="office_number" type="text" id="office_number" placeholder="0001"
               value="{{ old('office_number') ?? $bankAccount->office_number }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="office_digit" class="control-label">Agência DV</label>
        <input name="office_digit" type="text" id="office_digit" placeholder="Esse campo não é obrigatório"
               value="{{ old('office_digit') ?? $bankAccount->office_digit }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="account_number" class="control-label">Número da conta</label>
        <input name="account_number" type="text" id="account_number" placeholder="25478"
               value="{{ old('account_number') ?? $bankAccount->account_number }}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="account_digit" class="control-label">DV da conta</label>
        <input name="account_digit" type="text" id="account_digit" placeholder="2"
               value="{{ old('account_digit') ?? $bankAccount->account_digit }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="legal_name" class="control-label">Nome completo</label>
        <input name="legal_name" type="text" id="legal_name"
               value="{{ old('legal_name') ?? $bankAccount->legal_name }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="document_number" class="control-label">CPF ou CNPJ</label>
        <input name="document_number" type="text" id="document_number" placeholder="333.333.333-33"
               value="{{ old('document_number') ?? $bankAccount->document_number }}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="type" class="control-label">Tipo de conta</label>
        <select class="form-control" name="type">
            <option value="conta_corrente" {{ old('type') == "conta_corrente" ? 'selected' : '' }}>Conta corrente</option>
            <option value="conta_poupanca" {{ old('type') == "conta_poupanca" ? 'selected' : '' }}>Conta poupança</option>
            <option value="conta_corrente_conjunta" {{ old('type') == "conta_corrente_conjunta"? 'selected' : '' }}>Conta corrente conjunta</option>
            <option value="conta_poupanca_conjunta" {{ old('type') == "conta_poupanca_conjunta" ? 'selected' : '' }}>Conta poupanca conjunta</option>
        </select>
    </div>
</div>

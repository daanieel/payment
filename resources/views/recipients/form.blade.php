@csrf
<input type="hidden" name="company_id" value="{{$company->id}}">
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="name" class="control-label">Nome completo</label>
        <input name="name" type="text" id="name" placeholder="Lucas Henrique"
               value="{{ old('name') ?? $recipient->name }}" class="form-control">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="description" class="control-label">Descrição</label>
        <textarea name="description" id="description"
                  placeholder="Recebedor vinculado com a conta da empresa tal..." class="form-control">{{ old('description') ?? $recipient->description }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <div class="alert alert-warning" role="alert">
            Para cadastrar um 'Recipient' voce precisa vincular a uma 'BankAccount'. Caso ainda não tenha cadastrado uma
            <a href="{{route('company.bank-accounts.create', $company->id)}}">Clique aqui para criar uma 'BankAccount'</a>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="bank_account_id" class="control-label">Selecione uma 'BankAccount'</label>
        <select class="form-control" name="bank_account_id">
            @foreach($company->bankAccounts as $bankAccount)
                <option value="{{$bankAccount->id}}" {{ old('bank_account_id') ?? $recipient->bank_account_id == $bankAccount->id ? 'selected' : '' }}>
                    {{$bankAccount->legal_name}} - (Conta: {{$bankAccount->account_number}})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-1">
        <input class="form-check-input" type="checkbox" id="transfer_enabled" name="transfer_enabled"
            {{ (old('transfer_enabled') == 'on') || ($recipient->transfer_enabled == true) ? 'checked' : '' }}>
    </div>
    <div class="form-group col-md-11">
        <label class="form-check-label" for="transfer_enabled">
            Ativar transferência automática. (De acordo com as configurações será feito um TED periodicamente
            para a 'Bank Account' cadastrada independente do valor que tenha para saque.)
        </label>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="transfer_interval" class="control-label">Selecione a frequência do saque</label>
        <select class="form-control" name="transfer_interval">
            <option value="daily" {{ old('transfer_interval') ?? $recipient->transfer_interval == 'daily' ? 'selected' : '' }}>Diária</option>
            <option value="weekly" {{ old('transfer_interval')  ?? $recipient->transfer_interval == 'weekly' ? 'selected' : '' }}>Semanal</option>
            <option value="monthly" {{ old('transfer_interval')  ?? $recipient->transfer_interval == 'monthly' ? 'selected' : '' }}>Mensal</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="transfer_day" class="control-label">Dia da transferência</label>
        <input name="transfer_day" type="text" id="transfer_day" placeholder=""
               value="{{ old('transfer_day') ?? $recipient->transfer_day }}" class="form-control">
    </div>
</div>

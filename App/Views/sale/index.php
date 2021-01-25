<div id="sale" class="grey lighten-5">

    <nav>
        <div class="nav-wrapper indigo lighten-1">
            <div class="col s12 ml-4">
                <a href="<?= CONFIG['baseUrl'] . '/' ?>" class="breadcrumb">Venda</a>
            </div>
        </div>
    </nav>

    <div class="row mt-4 z-depth-1 ml-3 mb-3 mr-3">
        <div class="col s12 center">
            <h5>Adicionar Item</h5>
        </div>
        <div class="input-field col s12 m4">
            <select class="browser-default typeProductSale" id="typeProduct" onchange="requestProduct()" name="typeProduct">
                <option value="" disabled selected>Tipo de Produto</option>
            </select>
        </div>

        <div class="input-field col s12 m4">
            <select class="browser-default product" onchange="datasItem()" id="product" name="product">
                <option value="" disabled selected>Produto</option>
            </select>
        </div>

        <div class="input-field col s12 m4">
            <i class="material-icons prefix">loupe</i>
            <input id="qtd" name="qtd" disabled value="1" onkeyup="datasItem()" onclick="datasItem()" onkeypress="return event.charCode >= 48" min="1" max="100" type="number" class="validate qtd" required>
            <label for="qtd">Quantidade</label>
        </div>

        <div class="input-field col s12 m4">
            <i class="material-icons prefix">attach_money</i>
            <input disabled value="R$ 0,00" type="text" id="priceUnid" name="priceUnid" class="validate">
            <label for="priceUnid">Preço Uni.</label>
        </div>

        <div class="input-field col s12 m4">
            <i class="material-icons prefix">attach_money</i>
            <input disabled value="R$ 0,00" type="text" id="imposedUnid" name="imposedUnid" class="validate">
            <label for="imposedUnid">Imposto Uni.</label>
        </div>

        <div class="input-field col s12 m4">
            <i class="material-icons prefix">attach_money</i>
            <input disabled value="R$ 0,00" type="text" id="totalIten" name="totalIten" class="validate price">
            <label for="totalIten">Total</label>
        </div>
        <div class="input-field col s12">
            <div class="divider"></div>
            <a class="waves-effect right mt-3 waves-light btn disabled" id="btnAdd" onclick="addItem()"><i class="material-icons left">add</i>Adicionar</a>
        </div>
    </div>

    <div class="row mt-4 z-depth-1 ml-3 mb-3 mr-3">
        <div class="col s12 center">
            <h5>Total</h5>
        </div>
        <div class="input-field col s12 m3">
            <i class="material-icons prefix">add</i>
            <input disabled value="0" type="number" id="totalQtdItens" name="qtdItens" class="validate">
            <label for="qtdItens">Qtd Itens</label>
        </div>

        <div class="input-field col s12 m3">
            <i class="material-icons prefix">attach_money</i>
            <input disabled value="0,00" type="text" id="totalImposed" name="totalImposed" class="validate">
            <label for="totalImposed">Imposto</label>
        </div>

        <div class="input-field col s12 m3">
            <i class="material-icons prefix">attach_money</i>
            <input disabled value="0,00" type="text" id="totalSale" name="totalSale" class="validate">
            <label for="totalSale">Compra</label>
        </div>

        <div class="input-field col s12 m3">
            <i class="material-icons prefix">attach_money</i>
            <input disabled value="0,00" type="text" id="totalPay" name="totalPay" class="validate">
            <label for="totalPay">Total a Pagar</label>
        </div>

        <div class="input-field col s12">
            <div class="divider"></div>
            <a class="waves-effect right mt-3 waves-light btn disabled" id="btnSave" onclick="saveSale()"><i class="material-icons left">done</i>Finalizar</a>
        </div>
    </div>

    <div class="row z-depth-1 ml-3 mb-3 mr-3">
        <div class="col s12 center">
            <h5>Itens</h5>
        </div>
        <div class="col s12">
            <table class="responsive-table" id="tableItens">
                <thead class="head-table">
                    <tr>
                        <th>Id Produto</th>
                        <th>Produto</th>
                        <th>Vlr. Unit</th>
                        <th>Qtd.</th>
                        <th>% Imposto</th>
                        <th>TotalPago</th>
                    </tr>
                </thead>
                <tbody>
                 
                </tbody>
            </table>
        </div>
    </div>
    <br>
</div>
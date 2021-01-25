<div id="sale_show" class="grey lighten-5">

    <nav>
        <div class="nav-wrapper indigo lighten-1">
            <div class="col s12 ml-4">
                <a href="<?= CONFIG['baseUrl'] . '/' ?>" class="breadcrumb">Venda</a>
                <a href="#!" class="breadcrumb">Visualizar Vendas</a>
            </div>
        </div>
    </nav>

    <div class="row ml-3 mt-3 mb-3 mr-3">
        <div class="col s12 center">
        </div>
        <div class="col s12">
            <table class="responsive-table" id="table_show">
                <thead class="head-table">
                    <tr>
                        <th>Id</th>
                        <th>Imposto pago</th>
                        <th>Venda</th>
                        <th>Total</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <br>
</div>

<div id="modalShow" class="modal">
    <form id="delete" action="" method="">
        <input id="idDelete" hidden name="idDelete" type="text" class="" required>
        <div class="modal-content">
            <h4>Visualizar</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="s12">
                        <table class="" id="table_itens">
                            <thead class="head-table">
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd.</th>
                                    <th>% Imposto</th>
                                    <th>Preço Uni.</th>
                                    <th>Total Pago</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect grey lighten-1 btn">Fechar</a>
        </div>
    </form>
</div>
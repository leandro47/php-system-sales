<div id="product" class="grey lighten-5">
    <nav>
        <div class="nav-wrapper indigo lighten-1
">
            <div class="col s12 ml-4">
                <a href="<?= CONFIG['baseUrl'] . '/' ?>" class="breadcrumb">Venda</a>
                <a href="#!" class="breadcrumb">Produto</a>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m6 l6 mt-4 mb-4">
            <a class="btn-floating btn-large waves-effect waves-light red  modal-trigger" href="#modalAdd" id="btnNew"><i class="material-icons">add</i></a>
        </div>
        <div class="col s12 m12 l12 mb-4">
            <div class="divider"></div>
        </div>
        <div class="col s12 m12 l12">
            <table class="responsive-table" id="table_product">
                <thead class="head-table">
                    <tr>
                        <th class="center-align">Descrição</th>
                        <th class="center-align">Preço</th>
                        <th class="center-align">Categoria</th>
                        <th class="center-align">% Imposto</th>
                        <th class="center-align">Ações</th>
                    </tr>
                </thead>
                <tbody class="font-size-5">

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modalAdd" class="modal">
    <form id="add" action="" method="POST">
        <div class="modal-content">
            <h4>Novo</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">comment</i>
                        <input id="description" name="description" type="text" class="validate" required>
                        <label for="description">Descrição</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="price" name="price" type="text" class="validate price" required>
                        <label for="price">Preço</label>
                    </div>
                    <div class="input-field col s4">
                        <select class="browser-default typeProduct" id="typeProduct" name="typeProduct" required>
                            <option value="" disabled selected>Tipo de Produto</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect grey lighten-1 btn">Fechar</a>
            <button type="submit" class="waves-effect waves-green btn">Salvar</button>
        </div>
    </form>
</div>

<div id="modalUpdate" class="modal">
    <form id="update" action="" method="">
        <input id="idUpdate" hidden name="idUpdate" type="text" class="" required>
        <div class="modal-content">
            <h4>Atualizar</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">comment</i>
                        <input id="updateDescription" name="updateDescription" type="text" class="validate" required>
                        <span class="helper-text">Descrição</span>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">monetization_on</i>
                        <input id="updatePrice" name="updatePrice" type="text" class="validate price" required>
                        <span class="helper-text">Preço</span>
                    </div>
                    <div class="input-field col s4">
                        <select class="browser-default typeProduct" id="updateTypeProduct" name="updateTypeProduct">
                            <option value="" disabled selected>Tipo de Produto</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect grey lighten-1 btn">Fechar</a>
            <button type="submit" class="waves-effect waves-green btn">Salvar</button>
        </div>
    </form>
</div>

<div id="modalDelete" class="modal">
    <form id="delete" action="" method="">
        <input id="idDelete" hidden name="idDelete" type="text" class="" required>
        <div class="modal-content">
            <h4>Deletar</h4>
            <div class="divider"></div>
            <div class="row mt-4">
                <div class="row">
                    <div class="s12">
                        <h6>Deseja realmente deletar o produto <b id="descriptionDelete"></b> ?</h6>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect grey lighten-1 btn">Fechar</a>
            <button type="submit" class="waves-effect waves-green btn">Deletar</button>
        </div>
    </form>
</div>
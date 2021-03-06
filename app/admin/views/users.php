{{> header.inc}}
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3 class="page-header">Usuários</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAddPost" aria-expanded="false" aria-controls="collapseAddPost">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar
                        </button>
                        <div class="panel-group" id="accordion">
                            <div id="collapseAddPost" class="panel-collapse collapse">
                                <div class="well well-sm">
                                    <form role="form" method="post" action="{{adminInfo.url}}/users/cadastrar" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-8">
                                                <div class="form-group">
                                                    <label><span class="lead">Nome</span></label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label><span class="lead">Email</span></label>
                                                    <input type="email" class="form-control" name="email" data-validation="email">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label><span class="lead">Senha</span></label>
                                                            <input type="password" class="form-control" name="pass" data-validation="strength" data-validation-strength="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label><span class="lead">Confirme</span></label>
                                                            <input type="password" class="form-control" name="pass-confirme" data-validation="confirmation" data-validation-confirm="pass">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class="lead">Descrição</span></label>
                                                    <textarea class="form-control" rows="6" name="bio"></textarea>
                                                </div>
                                            </div>
                                            <!-- /.col-md-6 (nested) -->
                                            <div class="col-xs-12 col-sm-4 form-aside">
                                                <div class="form-group">
                                                    <h4>Acesso</h4>
                                                    <select class="form-control" name="role">
                                                        <option value="Editor">Editor</option>
                                                        <option value="Admin">Administrador</option>
                                                    </select>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <h4>
                                                        Imagem
                                                        <small>
                                                            <span class="label label-default">.png</span>
                                                            <span class="label label-default">.jpg</span>
                                                            <span class="label label-default">.gif</span>
                                                            <span class="label label-danger">Max: 300kb</span>
                                                        </small>
                                                    </h4>
                                                    <br>
                                                      <input class="form-control" type="file" name="image" onchange="imgPreview(this);">
                                                    <br>
                                                    <div class="img-input">
                                                        <img class="img-input-preview img-input-thumb" src="http://placehold.it/350x160?text=IMAGEM+DE+CAPA" alt="">
                                                        <div class="edit-img">
                                                            <a class="edit-img-button" data-toggle="modal" data-target="#editImageModal" href="#" title="Editar imagem">
                                                                <i class="fa fa-crop" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="editImageModal">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel">Editar Imagem</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="img-crop-container">
                                                                            <img id="img-crop-preview" class="img-input-preview" src="" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-submit text-right">
                                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                                </div>
                                            </div>
                                            <!-- /.col-md-6 (nested) -->
                                        </div>
                                        <!-- /.row (nested) -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Todos os usuários</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Drafts <span class="label label-default">7</span></a></li>
                                                    <li><a href="#">Trash <span class="label label-danger">42</span></a></li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Email</th>
                                                    <th>Nome</th>
                                                    <th>Criado</th>
                                                    <th>Editado</th>
                                                    <th>Acesso</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{#users}}
                                                <tr>
                                                    <td class="text-center">{{id}}</td>
                                                    <td>
                                                        <a href="{{adminInfo.url}}/users/editar/{{id}}">
                                                            <span class="lead">{{email}}</span>
                                                        </a>
                                                    </td>
                                                    <td><span class="lead">{{name}}</span></td>
                                                    <td class="text-center">
                                                        <span class="admin-datetime" data-date="{{createdDate}}"></span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="admin-datetime" data-date="{{editedDate}}"></span>
                                                    </td>
                                                    <td class="text-center">{{role}}</td>
                                                    <td class="text-center">
                                                        <a href="{{adminInfo.url}}/users/destaque/{{id}}" class="btn btn-default btn-circle" data-toggle="tooltip" data-placement="top" title="Destacar">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <a href="{{adminInfo.url}}/users/editar/{{id}}" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{adminInfo.url}}/users/apagar/{{id}}" class="btn btn-danger btn-circle apagar" data-toggle="tooltip" data-placement="top" title="Apagar">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                {{/users}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
{{> footer.inc}}

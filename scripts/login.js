/**
 * Created by MVMCJ on 28/06/2016.
 */

$(document)
    .ready(function () {
        $('.ui.form')
            .form({
                fields: {
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor insira um e-mail'
                            },
                            {
                                type: 'email',
                                prompt: 'Por favor insira um e-mail válido'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor insira uma senha'
                            },
                            {
                                type: 'length[6]',
                                prompt: 'Sua senha deve ter no minimo 6 caracteres.'
                            }
                        ]
                    }
                }
            })
        ;
    })
;

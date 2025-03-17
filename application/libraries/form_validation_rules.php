<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_validation_rules {
    
    public function get_rules($tipo) {
        // Combinar reglas base con reglas específicas
        $rules = array_merge(
            $this->get_base_rules(),
            $tipo == 1 ? $this->get_libertad_rules() : $this->get_detencion_rules()
        );
        
        return $rules;
    }
    public function get_base_rules_infractor() 
    {
        return [
            [
                'field' => 'nombre_inf',
                'label' => 'Nombres del Infractor',
                'rules' => 'required',
                'errors' => ['required' => 'El campo %s es obligatorio.']
            ],
            [
                'field' => 'apellidos_inf',
                'label' => 'Apellidos del Infractor',
                'rules' => 'required',
                'errors' => ['required' => 'El campo %s es obligatorio.']
            ],
            
            [
                'field' => 'cedula_inf',
                'label' => 'Cédula de Infractor',
                'rules' => 'required|callback_validar_cedula',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'validar_cedula' => 'La cédula ingresada no es válida.'
                ]
            ],
        ];
    }
    private function get_base_rules() {
        return [
            
            [
                'field' => 'distrito',
                'label' => 'Distrito',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'numeric' => 'Debe seleccionar un %s válido.'
                ]
            ],
            [
                'field' => 'act_id',
                'label' => 'Agente de Control de Transito',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Debe seleccionar un %s.',
                    'numeric' => 'Debe seleccionar un %s válido.'
                ]
                ],
                [
                    'field' => 'act_custodio',
                    'label' => 'A.C.T custodio',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Debe seleccionar un %s.',
                        'numeric' => 'Debe seleccionar un %s válido.'
                    ]
                    ],
            [
                'field' => 'canton',
                'label' => 'Cantón',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'numeric' => 'Debe seleccionar un %s válido.'
                ]
            ],
            [
                'field' => 'causa',
                'label' => 'Causa',
                'rules' => 'required|numeric', 
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'numeric' => 'Debe seleccionar una %s válida.'
                ]
            ],
            [
                'field' => 'tipo_prueba',
                'label' => 'Tipo de Prueba',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'numeric' => 'Debe seleccionar un %s válido.'
                ]
            ],
            [
                'field' => 'valor_prueba',
                'label' => 'Valor Prueba',
                'rules' => 'required',
                'errors' => ['required' => 'El campo %s es obligatorio.']
            ],
            [
                'field' => 'fecha_procedimiento',
                'label' => 'Fecha de Procedimiento',
                'rules' => 'required|callback_validar_fecha_rango',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'validar_fecha_rango' => 'El campo %s debe estar entre el año 2022 y la fecha actual.'
                ]
            ],
            [
                'field' => 'tipo_placa',
                'label' => 'Tipo de Placa',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'numeric' => 'Debe seleccionar un %s válido.'
                ]
            ],
            [
                'field' => 'num_placa',
                'label' => 'Número de Placa',
                'rules' => 'required',
                'errors' => ['required' => 'El campo %s es obligatorio.']
            ],
            [
                'field' => 'fecha_entrada_valoracion',
                'label' => 'Fecha y Hora de Entrada Valoración Médica',
                'rules' => 'required|callback_validar_fecha_rango',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'validar_fecha_rango' => 'El campo %s debe estar entre el año 2018 y la fecha actual.'
                ]
            ],
            [
                'field' => 'fecha_salida_valoracion',
                'label' => 'Fecha y Hora de Salida Valoración Médica',
                'rules' => 'required|callback_validar_fecha_rango',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'validar_fecha_rango' => 'El campo %s debe estar entre el año 2018 y la fecha actual.'
                ]
            ],
            [
                'field' => 'act_custodio',
                'label' => 'Agente Custodio',
                'rules' => 'required',
                'errors' => ['required' => 'El campo %s es obligatorio.']
            ],
        ];
    }
    
    private function get_libertad_rules() {
        return [
            [
                'field' => 'foto_libertad[]',
                'label' => 'Foto de Libertad',
                'rules' => 'callback_validar_imagen[foto_libertad]',
                'errors' => [
                    'validar_imagen' => 'El archivo %s debe ser un archivo válido (JPG, PNG, GIF, PDF, etc.).'
                ]
            ]
        ];
    }
    
    private function get_detencion_rules() {
        return [
           
            [
                'field' => 'centro_detencion',
                'label' => 'Centro de Detención',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.'
                ]
            ],
            [
                'field' => 'fecha_hora_recibe',
                'label' => 'Fecha y Hora',
                'rules' => 'required|callback_validar_fecha_rango',
                'errors' => [
                    'required' => 'El campo %s es obligatorio.',
                    'validar_fecha_rango' => 'El campo %s debe estar entre el año 2018 y la fecha actual.'
                ]
            ],
            [
                'field' => 'act_cdit',
                'label' => 'A.C.T recibe CDIT',
                'rules' => 'required',
                'errors' => ['required' => 'El campo %s es obligatorio.']
            ],
            [
                'field' => 'foto_detencion[]',
                'label' => 'Boleta de Encarcelamiento',
                'rules' => 'callback_validar_imagen[foto_detencion]',
                'errors' => [
                    'validar_imagen' => 'Cada archivo en %s debe ser un archivo válido (JPG, PNG, GIF, PDF, etc.).'
                ]
            ],
            [
                'field' => 'tiempo_detenido_anos',
                'label' => 'Años de Detención',
                'rules' => 'numeric|callback_validar_tiempo_detenido',
                'errors' => [
                    'numeric' => 'El campo %s debe contener solo números.',
                    'validar_tiempo_detenido' => 'Debe ingresar al menos un valor mayor a 0 en los campos de tiempo detenido.'
                ]
            ],
            [
                'field' => 'tiempo_detenido_meses',
                'label' => 'Meses de Detención',
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'El campo %s debe contener solo números.'
                ]
            ],
            [
                'field' => 'tiempo_detenido_dias',
                'label' => 'Días de Detención',
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'El campo %s debe contener solo números.'
                ]
            ],
            [
                'field' => 'tiempo_detenido_horas',
                'label' => 'Horas de Detención',
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'El campo %s debe contener solo números.'
                ]
            ]

            // ... resto de reglas de detención ...
        ];
    }
}
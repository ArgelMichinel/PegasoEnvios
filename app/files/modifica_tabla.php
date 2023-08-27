<?php
                        if ($key === 'country')  {
                            switch ($value) {
                              case 1:
                                $value = "Argentina";
                                break;
                              case 2:
                                $value = "Brasil";
                                break;
                              case 3:
                                $value = "Chile";
                                break;
                              case 4:
                                $value = "Perú";
                                break;
                              case 5:
                                $value = "Venezuela";
                                break;
                              default:
                                $value = "Argentina";
                                    }
                        }
                        if ($key === 'status_logistica')  {
                            switch ($value) {
                              case 0:
                                $value = "Ingresado";
                                break;
                              case 1:
                                $value = "Entregado";
                                break;
                              case 2:
                                $value = "1era visita";
                                break;
                              case 3:
                                $value = "2da visita";
                                break;
                              case 4:
                                $value = "Devuelto logística";
                                break;
                              case 5:
                                $value = "Devuelto MELI";
                                break;
                              case 6:
                                $value = "Entregado y cobrado";
                                break;
                              default:
                                $value = "Ingresado";
                                    }
                        }
                        if ($key === 'status')  {
                          switch ($value) {
                            case 'ready_to_ship':
                              $value = "En curso";
                              break;
                            case 'shipped':
                              if ($packets[$i]['date_first_visit'] === NULL)  {
                                $value = "En curso";
                              } else {
                                $value = "1era visita";
                              }
                              break;
                            case 'delivered':
                              $value = "Completado";
                              break;
                            case 'not_delivered':
                              $value = "No completado";
                              break;
                            case 'cancelled':
                              $value = "Cancelado";
                              break;
                            default:
                              $value = "En curso";
                                  }
                        }
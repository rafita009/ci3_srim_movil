SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: act_recibe_cdit
#

DROP TABLE IF EXISTS `act_recibe_cdit`;

CREATE TABLE `act_recibe_cdit` (
  `ID_ACT_RECIBE_CDIT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CDIT` int(11) DEFAULT NULL,
  `NOMBRE_ACT_CDIT` varchar(50) DEFAULT NULL,
  `CEDULA_ACT_CDIT` varchar(10) DEFAULT NULL,
  `NRO_ACT` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_ACT_RECIBE_CDIT`),
  KEY `FK_REFERENCE_18` (`ID_CDIT`),
  CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`ID_CDIT`) REFERENCES `cdit` (`ID_CDIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: archivos_detencion
#

DROP TABLE IF EXISTS `archivos_detencion`;

CREATE TABLE `archivos_detencion` (
  `ID_ARCH_DETENCION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) NOT NULL,
  `ID_PROCESO` int(11) NOT NULL,
  `RUTA_ARCH_DETENCION` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_ARCH_DETENCION`),
  KEY `FK_REFERENCE_ID_INFRACTOR_ARCH` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_PROCE` (`ID_PROCESO`),
  CONSTRAINT `FK_REFERENCE_ID_INFRACTOR_ARCH` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_ID_PROCE` FOREIGN KEY (`ID_PROCESO`) REFERENCES `procesos` (`ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4;

INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (26, 17, 17, './uploads/fotos_detencion/Juan_Alejandro_Perez_Almeida_6797ba7e65983.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (27, 17, 17, './uploads/fotos_detencion/Juan_Alejandro_Perez_Almeida_6797ba7e691c3.jpeg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (28, 21, 21, './uploads/fotos_detencion/jOSE_aNDRES_aGUIALR_YANOUCH_6797ce421d51c.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (29, 22, 22, './uploads/fotos_detencion/WWQWQ_QWQWQ_6797e2aa275b8.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (30, 22, 22, './uploads/fotos_detencion/WWQWQ_QWQWQ_6797e2aa2ba24.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (31, 23, 23, './uploads/fotos_detencion/Carolina_Mishell_Tobar_Teran_67981d2a58c40.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (32, 23, 23, './uploads/fotos_detencion/Carolina_Mishell_Tobar_Teran_67981d2a5bbb0.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (33, 23, 23, './uploads/fotos_detencion/Carolina_Mishell_Tobar_Teran_67981d2a61203.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (34, 23, 23, './uploads/fotos_detencion/Carolina_Mishell_Tobar_Teran_67981d2a65969.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (35, 24, 24, './uploads/fotos_detencion/Andres_Llerena_67981e450fc99.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (36, 24, 24, './uploads/fotos_detencion/Andres_Llerena_67981e451339c.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (37, 25, 25, './uploads/fotos_detencion/Lucas_Martinez_67984b520892c.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (38, 25, 25, './uploads/fotos_detencion/Lucas_Martinez_67984b520d852.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (39, 26, 26, './uploads/fotos_detencion/Nairo_Quintana_67985438bda10.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (40, 28, 28, './uploads/fotos_detencion/Julian_Moncada_67995299c66ff.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (41, 29, 29, './uploads/fotos_detencion/Juan__Padilla_67995803580d8.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (42, 29, 29, './uploads/fotos_detencion/Juan__Padilla_679958035937e.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (43, 29, 29, './uploads/fotos_detencion/Juan__Padilla_679958035ff7d.jpeg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (44, 31, 31, './uploads/fotos_detencion/Aroon_Rafael_Pusda_Aguilera_67a21783b5c74.jpeg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (45, 32, 32, './uploads/fotos_detencion/jjjjj_jkjkj_67a62c6891a9d.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (46, 32, 32, './uploads/fotos_detencion/jjjjj_jkjkj_67a62c6899c07.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (47, 34, 34, './uploads/fotos_detencion/hsajhsahj_hjasjhs_67a639627c907.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (48, 34, 34, './uploads/fotos_detencion/hsajhsahj_hjasjhs_67a639627e6b4.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (49, 35, 35, './uploads/fotos_detencion/xzxzxz_njkn_67a63cea008e2.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (50, 36, 36, './uploads/fotos_detencion/Julio__asas_67a6623c359f7.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (51, 37, 37, './uploads/fotos_detencion/jajaj_jajaj_67a662a2e5532.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (52, 39, 39, './uploads/fotos_detencion/pertenecnias_1221_67a6644aea16b.jpeg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (53, 39, 39, './uploads/fotos_detencion/pertenecnias_1221_67a6644aebc63.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (54, 40, 40, './uploads/fotos_detencion/josesi_ssasa_67a666216ddf3.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (55, 41, 41, './uploads/fotos_detencion/Prueba_Detencion_asas_67a7d4b16f1ac.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (56, 42, 42, './uploads/fotos_detencion/Pruebs_jajaj_67a7d55c2b3c2.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (57, 46, 46, './uploads/fotos_detencion/Fredy_Mueses_67ab5f1557419.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (58, 47, 47, './uploads/fotos_detencion/Fredy_Mueses_67ab5f1845acf.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (60, 60, 54, './uploads/fotos_detencion/ssaas_saas_67b22b4af3513.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (61, 76, 57, './uploads/fotos_detencion/jsajjs_jsjajsa_67b7284d19335.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (62, 76, 58, './uploads/fotos_detencion/jsajjs_jsjajsa_67b905645e702.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (63, 76, 59, './uploads/fotos_detencion/jsajjs_jsjajsa_67b90c1192cad.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (64, 76, 60, './uploads/fotos_detencion/jsajjs_jsjajsa_67b90d978dbd6.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (65, 76, 61, './uploads/fotos_detencion/jsajjs_jsjajsa_67b92824108ab.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (66, 77, 62, './uploads/fotos_detencion/Brandon_Cusicagua_67c499bf56014.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (67, 77, 63, './uploads/fotos_detencion/Brandon_Cusicagua_67c637a1e52b9.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (68, 77, 64, './uploads/fotos_detencion/Brandon_Cusicagua_67c63ab40cef0.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (69, 77, 65, './uploads/fotos_detencion/Brandon_Cusicagua_67c63b7b0e1a2.jpg');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (70, 60, 66, './uploads/fotos_detencion/ssaas_saas_67c64139782b5.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (71, 51, 67, './uploads/fotos_detencion/Yahit__asa_67c641a09881a.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (72, 102, 68, './uploads/fotos_detencion/Andres_Arcos_67c9a761b4629.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (73, 103, 69, './uploads/fotos_detencion/Alex__Alencastro_67c9a9c5d958c.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (74, 104, 70, './uploads/fotos_detencion/Alexandra_Juma_67cb32c167469.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (75, 105, 74, './uploads/fotos_detencion/Andres_Salazar_67d44b3392690.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (76, 106, 75, './uploads/fotos_detencion/Juan_Rea_67d44c2e361a4.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (77, 107, 76, './uploads/fotos_detencion/Andres__Salaza_67d44c78dc842.png');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (78, 110, 77, './uploads/fotos_detencion/Carolina__Tobar_Teran_67d451ac2cc5d.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (79, 111, 79, './uploads/fotos_detencion/Juana_Guevara_67d4ba0d295ae.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (80, 111, 80, './uploads/fotos_detencion/Juana_Guevara_67d4c25c9172d.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (81, 111, 81, './uploads/fotos_detencion/Juana_Guevara_67d4c35e10e51.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (82, 109, 84, './uploads/fotos_detencion/Juan_Alejandro_Perez_almeida_67d4c78067835.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (83, 109, 84, './uploads/fotos_detencion/Juan_Alejandro_Perez_almeida_67d4c7806ac0a.pdf');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (84, 112, 88, './uploads/fotos_detencion/Juano_Andres_67d4e48b86b4f.gif');
INSERT INTO `archivos_detencion` (`ID_ARCH_DETENCION`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_DETENCION`) VALUES (85, 112, 89, './uploads/fotos_detencion/Juano_Andres_67d510f50adb2.pdf');


#
# TABLE STRUCTURE FOR: archivos_libertad
#

DROP TABLE IF EXISTS `archivos_libertad`;

CREATE TABLE `archivos_libertad` (
  `ID_ARCH_LIBERTAD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) NOT NULL,
  `ID_PROCESO` int(11) NOT NULL,
  `RUTA_ARCH_LIBERTAD` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_ARCH_LIBERTAD`),
  KEY `FK_REFERENCE_ID_INFR_ARCH_LIB` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_PROC_ARCH_LIB` (`ID_PROCESO`),
  CONSTRAINT `FK_REFERENCE_ID_INFR_ARCH_LIB` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_ID_PROC_ARCH_LIB` FOREIGN KEY (`ID_PROCESO`) REFERENCES `procesos` (`ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (23, 19, 19, './uploads/fotos_libertad/Yamir_Martinez_Noboa_6797cd5d4d6aa.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (24, 20, 20, './uploads/fotos_libertad/Yamir_Martinez_Noboa_6797cd5d709f5.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (25, 27, 27, './uploads/fotos_libertad/Andres_Aguirre_6798f284c1342.pdf');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (26, 27, 27, './uploads/fotos_libertad/Andres_Aguirre_6798f284c33d2.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (27, 33, 33, './uploads/fotos_libertad/sasas_sasasa_67a62e52a9a0c.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (28, 33, 33, './uploads/fotos_libertad/sasas_sasasa_67a62e52abe00.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (29, 38, 38, './uploads/fotos_libertad/blanco_libertad_najknajk_67a662ee7090a.jpeg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (30, 41, 41, './uploads/fotos_libertad/Prueba_Detencion_asas_67a7d4b167d12.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (31, 42, 42, './uploads/fotos_libertad/Pruebs_jajaj_67a7d55c21a4c.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (32, 43, 43, './uploads/fotos_libertad/Prueba_2_sasa_67a7d5ae5bdab.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (33, 44, 44, './uploads/fotos_libertad/Prueba_boton_assa_67a7d76c3bb4b.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (34, 45, 45, './uploads/fotos_libertad/Prueba_libertad_boton_saas_67a7d92a26eeb.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (35, 45, 45, './uploads/fotos_libertad/Prueba_libertad_boton_saas_67a7d92a31a00.pdf');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (36, 48, 48, './uploads/fotos_libertad/Rafa__Pusda_67af58361d60d.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (37, 51, 49, './uploads/fotos_libertad/Yahit__asa_67b158db52a70.jpg');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (38, 104, 71, './uploads/fotos_libertad/Alexandra_Juma_67cb6a720870b.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (39, 104, 72, './uploads/fotos_libertad/Alexandra_Juma_67cb6e4383e23.png');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (40, 104, 73, './uploads/fotos_libertad/Alexandra_Juma_67cba871e41b7.pdf');
INSERT INTO `archivos_libertad` (`ID_ARCH_LIBERTAD`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_ARCH_LIBERTAD`) VALUES (41, 110, 78, './uploads/fotos_libertad/Carolina__Tobar_Teran_67d4521bab0a3.pdf');


#
# TABLE STRUCTURE FOR: cant_periodos
#

DROP TABLE IF EXISTS `cant_periodos`;

CREATE TABLE `cant_periodos` (
  `ID_CANT_PERIODO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CDIT` int(11) NOT NULL,
  `ID_INFRACTOR` int(11) NOT NULL,
  `ID_PROCESO` int(11) NOT NULL,
  `ANIOS` int(11) DEFAULT NULL,
  `MESES` int(11) DEFAULT NULL,
  `DIAS` int(11) DEFAULT NULL,
  `HORAS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CANT_PERIODO`),
  KEY `FK_REFERENCE_19` (`ID_CDIT`),
  KEY `FK_REFERENCE_20` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_PR` (`ID_PROCESO`),
  CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_CDIT`) REFERENCES `cdit` (`ID_CDIT`),
  CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_ID_PR` FOREIGN KEY (`ID_PROCESO`) REFERENCES `procesos` (`ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (1, 1, 17, 17, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (3, 1, 22, 22, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (4, 1, 26, 26, 2, 0, 2, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (5, 1, 28, 28, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (6, 1, 29, 29, 0, 1, 0, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (7, 1, 30, 30, 0, 0, 0, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (8, 1, 31, 31, 0, 1, 0, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (9, 1, 32, 32, 0, 0, 1, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (10, 1, 34, 34, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (11, 1, 35, 35, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (12, 1, 36, 36, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (13, 1, 37, 37, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (14, 1, 39, 39, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (15, 1, 40, 40, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (16, 1, 41, 41, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (17, 1, 42, 42, 0, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (18, 1, 46, 46, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (19, 1, 47, 47, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (20, 1, 60, 54, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (21, 1, 76, 57, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (22, 1, 76, 58, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (23, 1, 76, 59, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (24, 1, 76, 60, 0, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (25, 1, 76, 61, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (26, 1, 77, 62, 0, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (27, 1, 77, 63, 2, 2, 2, 2);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (28, 1, 77, 64, 2, 2, 2, 2);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (29, 1, 77, 65, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (30, 1, 60, 66, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (31, 1, 51, 67, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (32, 1, 102, 68, 1, 0, 1, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (33, 1, 103, 69, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (34, 1, 104, 70, 0, 1, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (35, 1, 105, 74, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (36, 1, 106, 75, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (37, 1, 107, 76, 0, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (38, 2, 110, 77, 0, 1, 0, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (39, 1, 111, 79, 0, 1, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (40, 1, 111, 80, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (41, 1, 111, 81, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (42, 1, 110, 82, 1, 1, 1, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (43, 1, 110, 83, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (44, 2, 109, 84, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (45, 1, 110, 85, 1, 0, 0, 1);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (46, 1, 108, 86, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (47, 1, 108, 87, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (48, 1, 112, 88, 1, 0, 0, 0);
INSERT INTO `cant_periodos` (`ID_CANT_PERIODO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `ANIOS`, `MESES`, `DIAS`, `HORAS`) VALUES (49, 1, 112, 89, 1, 0, 0, 0);


#
# TABLE STRUCTURE FOR: cantones
#

DROP TABLE IF EXISTS `cantones`;

CREATE TABLE `cantones` (
  `ID_CANTON` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DISTRITO` int(11) NOT NULL,
  `NOMBRE_CANTON` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_CANTON`),
  KEY `FK_REFERENCE_6` (`ID_DISTRITO`),
  CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_DISTRITO`) REFERENCES `distritos` (`ID_DISTRITO`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (1, 1, 'Mira');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (2, 1, 'Espejo');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (3, 1, 'Montufar');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (4, 1, 'Bolivar');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (5, 1, 'San Pedro de Huaca');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (6, 2, 'Antonio Ante');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (7, 2, 'Cotacachi');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (8, 2, 'Otavalo');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (9, 2, 'Pedro Moncayo');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (10, 3, 'Ibarra');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (11, 3, 'San Miguel de Urcuqui');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (12, 3, 'Pimampiro');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (13, 4, 'San Lorenzo');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (14, 4, 'Rio verde');
INSERT INTO `cantones` (`ID_CANTON`, `ID_DISTRITO`, `NOMBRE_CANTON`) VALUES (15, 4, 'Eloy Alfaro');


#
# TABLE STRUCTURE FOR: causa_distrito_infractor_canton
#

DROP TABLE IF EXISTS `causa_distrito_infractor_canton`;

CREATE TABLE `causa_distrito_infractor_canton` (
  `ID_CAUSA_DIS_INF_CAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DISTRITO` int(11) DEFAULT NULL,
  `ID_CANTON` int(11) NOT NULL,
  `ID_INFRACTOR` int(11) DEFAULT NULL,
  `ID_CAUSA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CAUSA_DIS_INF_CAN`),
  KEY `FK_REFERENCE_13` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_9` (`ID_DISTRITO`),
  KEY `FK_REFERENCE_CAUSA` (`ID_CAUSA`),
  KEY `FK_REFERENCE_CANTON` (`ID_CANTON`),
  CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_DISTRITO`) REFERENCES `distritos` (`ID_DISTRITO`),
  CONSTRAINT `FK_REFERENCE_CANTON` FOREIGN KEY (`ID_CANTON`) REFERENCES `cantones` (`ID_CANTON`),
  CONSTRAINT `FK_REFERENCE_CAUSA` FOREIGN KEY (`ID_CAUSA`) REFERENCES `causas` (`ID_CAUSA`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (17, 1, 2, 17, 3);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (19, 2, 6, 19, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (20, 2, 6, 20, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (21, 1, 1, 21, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (22, 1, 1, 22, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (23, 1, 1, 23, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (24, 1, 1, 24, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (25, 1, 2, 25, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (26, 1, 2, 26, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (27, 1, 1, 27, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (28, 2, 7, 28, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (29, 1, 1, 29, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (30, 2, 7, 30, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (31, 1, 1, 31, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (32, 1, 1, 32, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (33, 1, 1, 33, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (34, 1, 1, 34, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (35, 1, 1, 35, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (36, 1, 1, 36, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (37, 1, 1, 37, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (38, 1, 1, 38, 2);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (39, 1, 1, 39, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (40, 1, 1, 40, 3);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (41, 1, 1, 41, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (42, 1, 1, 42, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (43, 1, 1, 43, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (44, 1, 1, 44, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (45, 1, 1, 45, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (46, 2, 7, 46, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (47, 2, 7, 47, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (48, 1, 1, 48, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (49, 4, 13, 51, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (51, 2, 8, 60, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (52, 1, 1, 76, 2);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (53, 2, 6, 76, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (54, 1, 1, 76, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (55, 1, 1, 76, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (56, 1, 1, 76, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (57, 2, 7, 77, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (58, 1, 1, 77, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (59, 1, 1, 77, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (60, 1, 1, 77, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (61, 1, 1, 60, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (62, 2, 7, 51, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (63, 1, 1, 102, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (64, 1, 2, 103, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (65, 1, 2, 104, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (66, 1, 1, 104, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (67, 1, 3, 104, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (68, 1, 1, 104, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (69, 1, 1, 105, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (70, 1, 1, 106, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (71, 1, 1, 107, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (72, 1, 1, 110, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (73, 1, 1, 110, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (74, 1, 3, 111, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (75, 1, 1, 111, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (76, 2, 6, 111, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (77, 2, 6, 110, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (78, 2, 6, 110, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (79, 1, 1, 109, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (80, 1, 1, 110, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (81, 2, 6, 108, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (82, 1, 1, 108, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (83, 1, 1, 112, 1);
INSERT INTO `causa_distrito_infractor_canton` (`ID_CAUSA_DIS_INF_CAN`, `ID_DISTRITO`, `ID_CANTON`, `ID_INFRACTOR`, `ID_CAUSA`) VALUES (84, 3, 12, 112, 3);


#
# TABLE STRUCTURE FOR: causas
#

DROP TABLE IF EXISTS `causas`;

CREATE TABLE `causas` (
  `ID_CAUSA` int(11) NOT NULL AUTO_INCREMENT,
  `CAUSA` varchar(100) NOT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_CAUSA`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `causas` (`ID_CAUSA`, `CAUSA`, `ACTIVO`) VALUES (1, 'Accidente de transito', 1);
INSERT INTO `causas` (`ID_CAUSA`, `CAUSA`, `ACTIVO`) VALUES (2, 'Embriaguez', 1);
INSERT INTO `causas` (`ID_CAUSA`, `CAUSA`, `ACTIVO`) VALUES (3, 'Sin Licencia', 1);
INSERT INTO `causas` (`ID_CAUSA`, `CAUSA`, `ACTIVO`) VALUES (5, 'Accidente de ', 0);
INSERT INTO `causas` (`ID_CAUSA`, `CAUSA`, `ACTIVO`) VALUES (6, 'm', 0);


#
# TABLE STRUCTURE FOR: cdit
#

DROP TABLE IF EXISTS `cdit`;

CREATE TABLE `cdit` (
  `ID_CDIT` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CDIT` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_CDIT`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cdit` (`ID_CDIT`, `NOMBRE_CDIT`, `DIRECCION`, `ACTIVO`) VALUES (1, 'Centro de detencion de infractores de transito', 'Ibarra', 1);
INSERT INTO `cdit` (`ID_CDIT`, `NOMBRE_CDIT`, `DIRECCION`, `ACTIVO`) VALUES (2, 'aaa', 'aa', 0);


#
# TABLE STRUCTURE FOR: comentarios
#

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) DEFAULT NULL,
  `OBSERVACION` varchar(500) DEFAULT NULL,
  `NOVEDAD` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_COMENTARIO`),
  KEY `FK_REFERENCE_21` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (17, 17, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (19, 19, 'LOCO', 'LOCO');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (20, 20, 'LOCO', 'LOCO');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (21, 21, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (22, 22, 'No registra', 'ASAS');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (23, 23, 'sa', 'a');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (24, 24, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (25, 25, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (26, 26, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (27, 27, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (28, 28, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (29, 29, 'Ninguna', 'Viendo si registra los 0');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (30, 30, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (31, 31, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (32, 32, 'sas', 'sasa');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (33, 33, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (34, 34, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (35, 35, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (36, 36, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (37, 37, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (38, 38, 'saas', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (39, 39, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (40, 40, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (41, 41, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (42, 42, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (43, 43, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (44, 44, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (45, 45, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (46, 46, 'Nada', 'Si');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (47, 47, 'Nada', 'Si');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (48, 48, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (49, 51, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (51, 60, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (52, 76, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (53, 76, 'No registra', 'SASA');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (54, 76, 'asa', 'sasa');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (55, 76, 'assa', 'saas');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (56, 76, 'ASAS', 'SAS');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (57, 77, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (58, 77, 'SAS', 'SAS');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (59, 77, 'SAS', 'SAS');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (60, 77, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (61, 60, 'ASA', 'aaaaa');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (62, 51, 'sasa', 'sas');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (63, 102, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (64, 103, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (65, 104, 'No ', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (66, 104, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (67, 104, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (68, 104, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (69, 105, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (70, 106, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (71, 107, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (72, 110, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (73, 110, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (74, 111, 'lOREM iPSUMSAK\r\nSASAS\r\nSASASAS\r\nSASAS\r\nSASASASS3232FSF', 'SNAJKSNJKANSKJ\r\nDSDS43234423\r\nkljjknjsbhajhksa\r\nSASNAJK\r\n7897HJH\r\nSJKABHJSBA897\r\n7889\r\nSASASASA');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (75, 111, 'ASASAAS', 'ASSAAS');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (76, 111, 'SASAAS', 'SAAS');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (77, 110, 'ssa', 'sasa');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (78, 110, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (79, 109, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (80, 110, 'No registra', 'No registra');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (81, 108, 'sassa', 'saas');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (82, 108, 'No registra', 'saas');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (83, 112, 'ssa', 'saas');
INSERT INTO `comentarios` (`ID_COMENTARIO`, `ID_INFRACTOR`, `OBSERVACION`, `NOVEDAD`) VALUES (84, 112, 'sasas', 'sasa');


#
# TABLE STRUCTURE FOR: distritos
#

DROP TABLE IF EXISTS `distritos`;

CREATE TABLE `distritos` (
  `ID_DISTRITO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_DISTRITO` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_DISTRITO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `distritos` (`ID_DISTRITO`, `NOMBRE_DISTRITO`) VALUES (1, 'Distrito Norte');
INSERT INTO `distritos` (`ID_DISTRITO`, `NOMBRE_DISTRITO`) VALUES (2, 'Distrito Sur');
INSERT INTO `distritos` (`ID_DISTRITO`, `NOMBRE_DISTRITO`) VALUES (3, 'Distrito Centro');
INSERT INTO `distritos` (`ID_DISTRITO`, `NOMBRE_DISTRITO`) VALUES (4, 'Distrito Pacifico');


#
# TABLE STRUCTURE FOR: fecha_ingresos_cdit
#

DROP TABLE IF EXISTS `fecha_ingresos_cdit`;

CREATE TABLE `fecha_ingresos_cdit` (
  `ID_FECHA_HORA_INGRESO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CDIT` int(11) NOT NULL,
  `ID_INFRACTOR` int(11) NOT NULL,
  `ID_PROCESO` int(11) NOT NULL,
  `FECHA_HORA_INGRESO_CDIT` datetime NOT NULL,
  `ACT_RECIBE_CDIT` int(11) NOT NULL,
  PRIMARY KEY (`ID_FECHA_HORA_INGRESO`),
  KEY `FK_REFERENCE_23` (`ID_CDIT`),
  KEY `FK_REFERENCE_FCDIT_INFRACTOR` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_AGEN_RECI` (`ACT_RECIBE_CDIT`),
  KEY `FK_REFERENCE_ID_PROCES` (`ID_PROCESO`),
  CONSTRAINT `FK_REFERENCE_23` FOREIGN KEY (`ID_CDIT`) REFERENCES `cdit` (`ID_CDIT`),
  CONSTRAINT `FK_REFERENCE_FCDIT_INFRACTOR` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_ID_AGEN_RECI` FOREIGN KEY (`ACT_RECIBE_CDIT`) REFERENCES `tab_agentes` (`ID_AGENTE`),
  CONSTRAINT `FK_REFERENCE_ID_PROCES` FOREIGN KEY (`ID_PROCESO`) REFERENCES `procesos` (`ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (1, 1, 26, 26, '2024-12-26 09:49:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (2, 1, 28, 28, '2024-02-29 05:56:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (3, 1, 29, 29, '2024-12-27 04:00:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (4, 1, 30, 30, '2024-12-28 03:05:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (5, 1, 31, 31, '2022-01-05 07:22:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (6, 1, 32, 32, '2023-01-08 09:51:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (7, 1, 34, 34, '2024-01-06 10:47:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (8, 1, 35, 35, '2024-01-06 11:02:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (9, 1, 36, 36, '2024-01-08 01:39:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (10, 1, 37, 37, '2024-01-06 01:43:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (11, 1, 39, 39, '2024-01-06 01:50:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (12, 1, 40, 40, '2024-01-08 01:58:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (13, 1, 41, 41, '2024-02-11 06:02:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (14, 1, 42, 42, '2024-01-07 04:05:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (15, 1, 46, 46, '2025-02-11 09:27:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (16, 1, 47, 47, '2025-02-11 09:27:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (17, 1, 60, 54, '2024-01-15 00:13:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (18, 1, 76, 57, '2024-01-19 07:02:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (19, 1, 76, 58, '2024-01-20 04:58:00', 20);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (20, 1, 76, 59, '2024-01-20 05:27:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (21, 1, 76, 60, '2024-01-20 05:33:00', 25);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (22, 1, 76, 61, '2024-01-20 07:26:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (23, 1, 77, 62, '2025-03-01 11:46:00', 19);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (24, 1, 77, 63, '2025-03-03 05:12:00', 23);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (25, 1, 77, 64, '2025-03-03 05:12:00', 23);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (26, 1, 77, 65, '2025-03-03 05:29:00', 17);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (27, 1, 60, 66, '2024-02-02 05:53:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (28, 1, 51, 67, '2024-02-02 05:55:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (29, 1, 102, 68, '2024-02-05 09:47:00', 28);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (30, 1, 103, 69, '2024-02-05 07:56:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (31, 1, 104, 70, '2024-04-08 11:53:00', 23);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (32, 1, 105, 74, '2024-02-13 09:27:00', 55);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (33, 1, 106, 75, '2024-02-13 09:31:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (34, 1, 107, 76, '2024-02-13 09:33:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (35, 2, 110, 77, '2024-02-13 09:54:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (36, 1, 111, 79, '2024-02-13 05:19:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (37, 1, 111, 80, '2024-02-13 05:56:00', 41);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (38, 1, 111, 81, '2024-02-13 06:00:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (39, 1, 110, 82, '2024-05-15 06:13:00', 55);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (40, 1, 110, 83, '2024-02-13 06:16:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (41, 2, 109, 84, '2024-02-13 06:17:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (42, 1, 110, 85, '2024-02-13 06:18:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (43, 1, 108, 86, '2024-02-13 06:25:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (44, 1, 108, 87, '2024-02-13 06:28:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (45, 1, 112, 88, '2024-02-13 08:21:00', 45);
INSERT INTO `fecha_ingresos_cdit` (`ID_FECHA_HORA_INGRESO`, `ID_CDIT`, `ID_INFRACTOR`, `ID_PROCESO`, `FECHA_HORA_INGRESO_CDIT`, `ACT_RECIBE_CDIT`) VALUES (46, 1, 112, 89, '2024-02-14 11:31:00', 45);


#
# TABLE STRUCTURE FOR: fecha_ingresos_vm
#

DROP TABLE IF EXISTS `fecha_ingresos_vm`;

CREATE TABLE `fecha_ingresos_vm` (
  `ID_FECHA_INGRESO_VM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) NOT NULL,
  `FECHA_HORA_INGRESO_VM` datetime NOT NULL,
  `ID_AGENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_FECHA_INGRESO_VM`),
  KEY `FK_REFERENCE_ID_INFRACTOR` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_AGENTE` (`ID_AGENTE`),
  CONSTRAINT `FK_REFERENCE_ID_AGENTE` FOREIGN KEY (`ID_AGENTE`) REFERENCES `tab_agentes` (`ID_AGENTE`),
  CONSTRAINT `FK_REFERENCE_ID_INFRACTOR` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (1, 26, '2024-12-26 09:48:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (2, 27, '2024-12-27 09:03:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (3, 28, '2024-12-27 03:49:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (4, 29, '2024-12-27 04:59:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (5, 30, '2024-12-28 03:04:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (6, 31, '2024-01-05 07:22:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (7, 32, '2024-01-06 08:50:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (8, 33, '2024-01-06 10:59:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (9, 34, '2024-02-06 10:46:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (10, 35, '2024-01-06 11:02:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (11, 36, '2024-01-06 01:39:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (12, 37, '2024-01-06 13:42:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (13, 38, '2024-01-06 01:44:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (14, 39, '2024-01-06 01:50:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (15, 40, '2024-01-06 01:57:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (16, 41, '2024-01-07 16:01:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (17, 42, '2024-01-07 04:04:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (18, 43, '2024-01-07 04:06:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (19, 44, '2024-01-07 04:12:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (20, 45, '2024-01-07 04:19:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (21, 46, '2025-02-11 09:26:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (22, 47, '2025-02-11 09:26:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (23, 48, '2025-01-13 08:48:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (24, 51, '2025-02-15 11:14:00', 17);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (25, 60, '2025-01-13 12:12:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (26, 76, '2025-01-20 09:01:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (27, 76, '2024-01-20 04:58:00', 25);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (28, 76, '2024-01-20 05:26:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (29, 76, '2024-01-20 05:33:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (30, 76, '2024-01-20 21:28:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (31, 77, '2025-03-01 01:46:00', 37);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (32, 77, '2025-03-03 05:11:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (33, 77, '2025-03-03 05:11:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (34, 77, '2025-03-03 17:26:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (35, 60, '2024-02-02 05:52:00', 50);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (36, 51, '2025-03-03 05:54:00', 24);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (37, 102, '2024-02-05 07:45:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (38, 103, '2024-02-05 07:55:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (39, 104, '2025-03-04 01:50:00', 31);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (40, 104, '2024-02-06 03:00:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (41, 104, '2024-02-06 04:01:00', 25);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (42, 104, '2024-02-06 08:14:00', 21);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (43, 105, '2024-02-13 11:28:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (44, 106, '2024-02-13 09:31:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (45, 107, '2024-02-13 09:32:00', 55);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (46, 110, '2024-02-13 09:54:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (47, 110, '2024-02-13 09:57:00', 55);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (48, 111, '2024-02-13 07:20:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (49, 111, '2024-02-13 05:55:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (50, 111, '2024-02-13 06:00:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (51, 110, '2024-02-13 06:13:00', 55);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (52, 110, '2024-02-13 18:16:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (53, 109, '2024-02-13 06:17:00', 55);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (54, 110, '2024-02-13 06:18:00', 19);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (55, 108, '2024-02-13 06:24:00', 21);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (56, 108, '2024-02-13 06:28:00', 45);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (57, 112, '2024-02-13 08:21:00', 55);
INSERT INTO `fecha_ingresos_vm` (`ID_FECHA_INGRESO_VM`, `ID_INFRACTOR`, `FECHA_HORA_INGRESO_VM`, `ID_AGENTE`) VALUES (58, 112, '2024-02-14 11:30:00', 55);


#
# TABLE STRUCTURE FOR: fecha_salidas_vm
#

DROP TABLE IF EXISTS `fecha_salidas_vm`;

CREATE TABLE `fecha_salidas_vm` (
  `ID_FECHA_SALIDA_VM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) NOT NULL,
  `FECHA_HORA_SALIDA_VM` datetime NOT NULL,
  `ID_AGENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_FECHA_SALIDA_VM`),
  KEY `FK_REFERENCE_SALIDA_INF` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_AGENTE_VM` (`ID_AGENTE`),
  CONSTRAINT `FK_REFERENCE_ID_AGENTE_VM` FOREIGN KEY (`ID_AGENTE`) REFERENCES `tab_agentes` (`ID_AGENTE`),
  CONSTRAINT `FK_REFERENCE_SALIDA_INF` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (1, 26, '2024-11-26 09:48:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (2, 27, '2024-12-27 09:03:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (3, 28, '2024-12-27 03:49:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (4, 29, '2024-12-27 04:00:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (5, 30, '2024-12-28 03:04:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (6, 31, '2024-01-03 07:22:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (7, 32, '2024-01-06 09:50:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (8, 33, '2024-01-06 10:59:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (9, 34, '2024-01-06 10:47:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (10, 35, '2024-01-06 11:02:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (11, 36, '2024-01-06 01:39:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (12, 37, '2024-01-06 13:42:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (13, 38, '2024-01-06 01:44:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (14, 39, '2024-01-06 01:50:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (15, 40, '2024-01-06 01:57:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (16, 41, '2023-12-07 04:01:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (17, 42, '2024-01-07 04:04:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (18, 43, '2024-01-07 04:06:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (19, 44, '2024-01-07 03:12:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (20, 45, '2024-01-07 04:19:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (21, 46, '2025-02-11 09:27:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (22, 47, '2025-02-11 09:27:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (23, 48, '2025-02-14 09:50:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (24, 51, '2025-02-15 09:14:00', 17);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (25, 60, '2024-01-15 12:12:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (26, 76, '2024-01-19 07:01:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (27, 76, '2024-01-20 04:58:00', 25);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (28, 76, '2024-01-20 05:26:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (29, 76, '2024-01-20 05:33:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (30, 76, '2024-01-20 07:26:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (31, 77, '2025-03-01 01:46:00', 37);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (32, 77, '2024-02-02 05:11:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (33, 77, '2024-02-02 05:11:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (34, 77, '2024-02-02 17:26:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (35, 60, '2024-02-02 05:52:00', 50);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (36, 51, '2024-03-04 05:54:00', 24);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (37, 102, '2024-02-05 07:45:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (38, 103, '2024-02-05 07:55:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (39, 104, '2024-03-04 11:49:00', 31);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (40, 104, '2024-02-06 03:00:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (41, 104, '2024-02-06 04:01:00', 25);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (42, 104, '2024-02-06 08:14:00', 21);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (43, 105, '2024-04-13 11:28:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (44, 106, '2024-02-13 09:31:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (45, 107, '2024-02-13 09:32:00', 55);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (46, 110, '2024-02-13 09:54:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (47, 110, '2024-02-13 09:57:00', 55);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (48, 111, '2024-02-13 08:20:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (49, 111, '2024-02-13 05:55:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (50, 111, '2024-02-13 06:00:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (51, 110, '2024-02-13 06:13:00', 55);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (52, 110, '2024-02-13 06:16:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (53, 109, '2024-02-13 06:17:00', 55);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (54, 110, '2024-02-13 06:18:00', 19);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (55, 108, '2024-02-13 06:24:00', 21);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (56, 108, '2024-02-13 06:28:00', 45);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (57, 112, '2024-02-13 08:21:00', 55);
INSERT INTO `fecha_salidas_vm` (`ID_FECHA_SALIDA_VM`, `ID_INFRACTOR`, `FECHA_HORA_SALIDA_VM`, `ID_AGENTE`) VALUES (58, 112, '2024-02-14 23:30:00', 55);


#
# TABLE STRUCTURE FOR: fechas_procedimiento
#

DROP TABLE IF EXISTS `fechas_procedimiento`;

CREATE TABLE `fechas_procedimiento` (
  `ID_FECHA_PROCEDIMIENTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROCESO` int(11) NOT NULL,
  `FECHA_PROCEDIMIENTO` date NOT NULL,
  PRIMARY KEY (`ID_FECHA_PROCEDIMIENTO`),
  KEY `FK_REFERENCE_ID_PROCESO` (`ID_PROCESO`),
  CONSTRAINT `FK_REFERENCE_ID_PROCESO` FOREIGN KEY (`ID_PROCESO`) REFERENCES `procesos` (`ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (17, 17, '2024-12-28');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (19, 19, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (20, 20, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (21, 21, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (22, 22, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (23, 23, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (24, 24, '2024-12-28');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (25, 25, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (26, 26, '2024-12-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (27, 27, '2024-12-27');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (28, 28, '2024-12-27');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (29, 29, '2024-12-27');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (30, 30, '2024-12-28');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (31, 31, '2022-01-03');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (32, 32, '2024-03-08');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (33, 33, '2024-01-08');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (34, 34, '2024-01-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (35, 35, '2024-01-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (36, 36, '2020-01-07');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (37, 37, '2024-01-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (38, 38, '2024-01-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (39, 39, '2024-01-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (40, 40, '2024-01-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (41, 41, '2024-01-07');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (42, 42, '2024-01-09');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (43, 43, '2024-01-07');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (44, 44, '2024-01-07');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (45, 45, '2024-01-07');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (46, 46, '2025-02-11');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (47, 47, '2025-02-11');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (48, 48, '2024-01-15');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (49, 49, '2025-02-15');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (51, 54, '2025-02-05');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (52, 57, '2025-02-20');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (53, 58, '2025-02-21');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (54, 59, '2025-02-21');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (55, 60, '2025-02-18');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (56, 61, '2025-02-20');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (57, 62, '2025-02-26');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (58, 63, '2025-03-03');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (59, 64, '2025-03-03');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (60, 65, '2025-03-03');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (61, 66, '2025-03-03');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (62, 67, '2025-03-03');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (63, 68, '2025-02-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (64, 69, '2025-03-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (65, 70, '2025-03-04');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (66, 71, '2024-02-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (67, 72, '2024-02-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (68, 73, '2024-02-06');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (69, 74, '2025-03-14');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (70, 75, '2025-03-14');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (71, 76, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (72, 77, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (73, 78, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (74, 79, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (75, 80, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (76, 81, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (77, 82, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (78, 83, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (79, 84, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (80, 85, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (81, 86, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (82, 87, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (83, 88, '2024-02-13');
INSERT INTO `fechas_procedimiento` (`ID_FECHA_PROCEDIMIENTO`, `ID_PROCESO`, `FECHA_PROCEDIMIENTO`) VALUES (84, 89, '2024-02-14');


#
# TABLE STRUCTURE FOR: fotos_infractores
#

DROP TABLE IF EXISTS `fotos_infractores`;

CREATE TABLE `fotos_infractores` (
  `ID_FOTO_INF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) DEFAULT NULL,
  `RUTA_INFRACTOR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_FOTO_INF`),
  KEY `FK_REFERENCE_22` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (17, 17, './uploads/fotos_infractores/Juan_Alejandro_Perez_A');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (19, 19, './uploads/fotos_infractores/Yamir_Martinez_Noboa.j');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (20, 20, './uploads/fotos_infractores/Yamir_Martinez_Noboa.j');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (21, 21, './uploads/fotos_infractores/jOSE_aNDRES_aGUIALR_YA');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (22, 22, './uploads/fotos_infractores/WWQWQ_QWQWQ.jpg');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (23, 23, './uploads/fotos_infractores/Carolina_Mishell_Tobar');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (24, 25, './uploads/fotos_infractores/Lucas_Martinez.jpeg');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (25, 26, './uploads/fotos_infractores/Nairo_Quintana.jpeg');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (26, 27, './uploads/fotos_infractores/Andres_Aguirre.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (27, 29, './uploads/fotos_infractores/Juan__Padilla.jpg');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (28, 30, './uploads/fotos_infractores/Prueba_Prueba.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (29, 31, './uploads/fotos_infractores/Aroon_Rafael_Pusda_Aguilera_67a21782a1361.jpeg');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (30, 33, './uploads/fotos_infractores/sasas_sasasa_67a62e529911f.jpg');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (31, 34, './uploads/fotos_infractores/hsajhsahj_hjasjhs_67a6396272797.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (32, 35, './uploads/fotos_infractores/xzxzxz_njkn_67a63ce9ec729.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (33, 36, './uploads/fotos_infractores/Julio__asas_67a6623c2238b.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (34, 37, './uploads/fotos_infractores/jajaj_jajaj_67a662a1ac29c.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (35, 39, './uploads/fotos_infractores/pertenecnias_1221_67a6644adc5eb.png');
INSERT INTO `fotos_infractores` (`ID_FOTO_INF`, `ID_INFRACTOR`, `RUTA_INFRACTOR`) VALUES (36, 40, './uploads/fotos_infractores/josesi_ssasa_67a666215aebf.png');


#
# TABLE STRUCTURE FOR: fotos_pertenencias
#

DROP TABLE IF EXISTS `fotos_pertenencias`;

CREATE TABLE `fotos_pertenencias` (
  `ID_FOTO_PERTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INFRACTOR` int(11) NOT NULL,
  `ID_PROCESO` int(11) NOT NULL,
  `RUTA_PERTENENCIAS` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_FOTO_PERTE`),
  KEY `FK_REFERENCE_ID_INFRACTOR_FOTO` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_PROC` (`ID_PROCESO`),
  CONSTRAINT `FK_REFERENCE_ID_INFRACTOR_FOTO` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_ID_PROC` FOREIGN KEY (`ID_PROCESO`) REFERENCES `procesos` (`ID_PROCESO`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4;

INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (50, 17, 17, './uploads/fotos_pertenencias/Juan_Alejandro_Perez_Almeida_1.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (51, 17, 17, './uploads/fotos_pertenencias/Juan_Alejandro_Perez_Almeida_2.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (52, 17, 17, './uploads/fotos_pertenencias/Juan_Alejandro_Perez_Almeida_3.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (55, 19, 19, './uploads/fotos_pertenencias/Yamir_Martinez_Noboa_1.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (56, 19, 19, './uploads/fotos_pertenencias/Yamir_Martinez_Noboa_2.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (57, 20, 20, './uploads/fotos_pertenencias/Yamir_Martinez_Noboa_1.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (58, 20, 20, './uploads/fotos_pertenencias/Yamir_Martinez_Noboa_2.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (59, 21, 21, './uploads/fotos_pertenencias/jOSE_aNDRES_aGUIALR_YANOUCH_1.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (60, 22, 22, './uploads/fotos_pertenencias/WWQWQ_QWQWQ_1.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (61, 23, 23, './uploads/fotos_pertenencias/Carolina_Mishell_Tobar_Teran_1.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (62, 23, 23, './uploads/fotos_pertenencias/Carolina_Mishell_Tobar_Teran_2.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (63, 26, 26, './uploads/fotos_pertenencias/Nairo_Quintana_1.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (64, 26, 26, './uploads/fotos_pertenencias/Nairo_Quintana_2.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (65, 27, 27, './uploads/fotos_pertenencias/Andres_Aguirre_1.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (66, 27, 27, './uploads/fotos_pertenencias/Andres_Aguirre_2.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (67, 29, 29, './uploads/fotos_pertenencias/Juan__Padilla_1.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (68, 29, 29, './uploads/fotos_pertenencias/Juan__Padilla_2.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (69, 29, 29, './uploads/fotos_pertenencias/Juan__Padilla_3.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (70, 29, 29, './uploads/fotos_pertenencias/Juan__Padilla_4.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (71, 30, 30, './uploads/fotos_pertenencias/Prueba_Prueba_1_679a9903523ee.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (72, 30, 30, './uploads/fotos_pertenencias/Prueba_Prueba_2_679a990357909.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (73, 30, 30, './uploads/fotos_pertenencias/Prueba_Prueba_3_679a99035e26e.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (74, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_1_67a217839d4f2.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (75, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_2_67a21783a2c94.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (76, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_3_67a21783a63cf.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (77, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_4_67a21783a7848.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (78, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_5_67a21783a8e65.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (79, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_6_67a21783ac94f.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (80, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_7_67a21783aedbe.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (81, 31, 31, './uploads/fotos_pertenencias/Aroon_Rafael_Pusda_Aguilera_8_67a21783b0953.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (82, 33, 33, './uploads/fotos_pertenencias/sasas_sasasa_1_67a62e529fe0b.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (83, 33, 33, './uploads/fotos_pertenencias/sasas_sasasa_2_67a62e52a35fc.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (84, 33, 33, './uploads/fotos_pertenencias/sasas_sasasa_3_67a62e52a6172.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (85, 33, 33, './uploads/fotos_pertenencias/sasas_sasasa_4_67a62e52a7f41.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (86, 34, 34, './uploads/fotos_pertenencias/hsajhsahj_hjasjhs_1_67a639627763b.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (87, 34, 34, './uploads/fotos_pertenencias/hsajhsahj_hjasjhs_2_67a63962791b9.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (88, 35, 35, './uploads/fotos_pertenencias/xzxzxz_njkn_1_67a63ce9eefda.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (89, 35, 35, './uploads/fotos_pertenencias/xzxzxz_njkn_2_67a63ce9f13a7.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (90, 35, 35, './uploads/fotos_pertenencias/xzxzxz_njkn_3_67a63ce9f2ab7.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (91, 36, 36, './uploads/fotos_pertenencias/Julio__asas_1_67a6623c2e128.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (92, 36, 36, './uploads/fotos_pertenencias/Julio__asas_2_67a6623c2fac0.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (93, 36, 36, './uploads/fotos_pertenencias/Julio__asas_3_67a6623c312bf.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (94, 36, 36, './uploads/fotos_pertenencias/Julio__asas_4_67a6623c333a4.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (95, 37, 37, './uploads/fotos_pertenencias/jajaj_jajaj_1_67a662a2d88b4.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (96, 37, 37, './uploads/fotos_pertenencias/jajaj_jajaj_2_67a662a2dc21d.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (97, 37, 37, './uploads/fotos_pertenencias/jajaj_jajaj_3_67a662a2e15ff.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (98, 39, 39, './uploads/fotos_pertenencias/pertenecnias_1221_1_67a6644ae1e4b.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (99, 39, 39, './uploads/fotos_pertenencias/pertenecnias_1221_2_67a6644ae5963.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (100, 39, 39, './uploads/fotos_pertenencias/pertenecnias_1221_3_67a6644ae75ff.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (101, 40, 40, './uploads/fotos_pertenencias/josesi_ssasa_1_67a66621600e5.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (102, 40, 40, './uploads/fotos_pertenencias/josesi_ssasa_2_67a6662162c90.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (103, 40, 40, './uploads/fotos_pertenencias/josesi_ssasa_3_67a66621658b6.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (104, 40, 40, './uploads/fotos_pertenencias/josesi_ssasa_4_67a666216901d.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (120, 76, 57, './uploads/fotos_pertenencias/jsajjs_jsjajsa_1_67b7284d10274.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (121, 76, 57, './uploads/fotos_pertenencias/jsajjs_jsjajsa_2_67b7284d14f7e.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (122, 76, 58, './uploads/fotos_pertenencias/jsajjs_jsjajsa_1_67b9056444ebd.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (123, 76, 58, './uploads/fotos_pertenencias/jsajjs_jsjajsa_2_67b905644ce27.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (124, 76, 58, './uploads/fotos_pertenencias/jsajjs_jsjajsa_3_67b90564522c2.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (125, 76, 58, './uploads/fotos_pertenencias/jsajjs_jsjajsa_4_67b905645803b.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (126, 76, 61, './uploads/fotos_pertenencias/jsajjs_jsjajsa_1_67b92823ef351.jpeg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (127, 76, 61, './uploads/fotos_pertenencias/jsajjs_jsjajsa_2_67b9282401c9c.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (128, 76, 61, './uploads/fotos_pertenencias/jsajjs_jsjajsa_3_67b9282407989.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (129, 77, 63, './uploads/fotos_pertenencias/Brandon_Cusicagua_1_67c637a1d692d.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (130, 77, 63, './uploads/fotos_pertenencias/Brandon_Cusicagua_2_67c637a1dc634.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (131, 77, 63, './uploads/fotos_pertenencias/Brandon_Cusicagua_3_67c637a1deea0.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (132, 77, 63, './uploads/fotos_pertenencias/Brandon_Cusicagua_4_67c637a1e2200.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (133, 77, 64, './uploads/fotos_pertenencias/Brandon_Cusicagua_1_67c63ab3e473e.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (134, 77, 64, './uploads/fotos_pertenencias/Brandon_Cusicagua_2_67c63ab3ebe79.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (135, 77, 64, './uploads/fotos_pertenencias/Brandon_Cusicagua_3_67c63ab3f2589.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (136, 77, 64, './uploads/fotos_pertenencias/Brandon_Cusicagua_4_67c63ab405955.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (137, 77, 65, './uploads/fotos_pertenencias/Brandon_Cusicagua_1_67c63b7af3aab.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (138, 77, 65, './uploads/fotos_pertenencias/Brandon_Cusicagua_2_67c63b7b06fc2.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (139, 102, 68, './uploads/fotos_pertenencias/Andres_Arcos_1_67c9a761a2358.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (140, 102, 68, './uploads/fotos_pertenencias/Andres_Arcos_2_67c9a761a8a58.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (141, 102, 68, './uploads/fotos_pertenencias/Andres_Arcos_3_67c9a761adeed.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (142, 111, 80, './uploads/fotos_pertenencias/Juana_Guevara_1_67d4c25c80e2b.svg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (143, 111, 80, './uploads/fotos_pertenencias/Juana_Guevara_2_67d4c25c84c1c.jpg');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (144, 111, 81, './uploads/fotos_pertenencias/Juana_Guevara_1_67d4c35e06e9d.png');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (145, 110, 82, './uploads/fotos_pertenencias/Carolina__Tobar_Teran_2_67d4c68a460a9.gif');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (146, 109, 84, './uploads/fotos_pertenencias/Juan_Alejandro_Perez_almeida_2_67d4c7805e970.gif');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (147, 110, 85, './uploads/fotos_pertenencias/Carolina__Tobar_Teran_1_67d4c7cd75b4d.gif');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (148, 108, 86, './uploads/fotos_pertenencias/Juan_Linares_2_67d4c9255eba1.gif');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (149, 108, 87, './uploads/fotos_pertenencias/Juan_Linares_2_67d4ca04b5276.gif');
INSERT INTO `fotos_pertenencias` (`ID_FOTO_PERTE`, `ID_INFRACTOR`, `ID_PROCESO`, `RUTA_PERTENENCIAS`) VALUES (150, 112, 88, './uploads/fotos_pertenencias/Juano_Andres_1_67d4e48b6efb1.gif');


#
# TABLE STRUCTURE FOR: infractores
#

DROP TABLE IF EXISTS `infractores`;

CREATE TABLE `infractores` (
  `ID_INFRACTOR` int(11) NOT NULL AUTO_INCREMENT,
  `N_INFRACTOR` varchar(50) NOT NULL,
  `A_INFRACTOR` varchar(50) NOT NULL,
  `C_INFRACTOR` varchar(10) NOT NULL,
  `T_INFRACTOR` varchar(20) DEFAULT NULL,
  `F_INFRACTOR_RUTA` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_INFRACTOR`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (17, 'Juan Alejandro', 'Perez Almeida', '1002509964', '098828221', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (19, 'Yamir', 'Martinez Noboa', '1002386611', '099887797', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (20, 'Yamir', 'Martinez Noboa', '1002386611', '099887797', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (21, 'jOSE aNDRES', 'aGUIALR YANOUCH', '1002509964', '0994948439', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (22, 'WWQWQ', 'QWQWQ', '1004254833', '2531515', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (23, 'Carolina Mishell', 'Tobar Teran', '1002509964', '0994948439', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (24, 'Andres', 'Llerena', '1004254833', '920182912', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (25, 'Lucas', 'Martinez', '1004254833', '9089978787', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (26, 'Nairo', 'Quintana', '1004254833', '0999888', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (27, 'Andres', 'Aguirre', '1002386611', '123565555', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (28, 'Julian', 'Moncada', '1002509964', '02656565', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (29, 'Juan ', 'Padilla', '1002509964', '0967899', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (30, 'Prueba', 'Prueba', '1002386611', '1004254833', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (31, 'Aroon Rafael', 'Pusda Aguilera', '1004735153', '0963473393', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (32, 'jjjjj', 'jkjkj', '1004254833', 'as', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (33, 'sasas', 'sasasa', '1004254833', 'sass', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (34, 'hsajhsahj', 'hjasjhs', '1004254833', 'sasasa', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (35, 'xzxzxz', 'njkn', '1718410358', '1211', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (36, 'Julio ', 'asas', '1004254833', '121', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (37, 'jajaj', 'jajaj', '1004254833', '0994948439', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (38, 'blanco libertad', 'najknajk', '1002386611', 'assasa', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (39, 'pertenecnias', '1221', '1002386611', '0224545', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (40, 'josesi', 'ssasa', '1002386611', '15151', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (41, 'Prueba Detencion', 'asas', '1004254833', 'asas', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (42, 'Pruebs', 'jajaj', '1002386611', 'kaka', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (43, 'Prueba 2', 'sasa', '1004254833', 'saas', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (44, 'Prueba boton', 'assa', '1004254833', '0967190655', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (45, 'Prueba libertad boton', 'saas', '1004254833', 'saas', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (46, 'Fredy', 'Mueses', '1004143614', '0999421527', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (47, 'Fredy', 'Mueses', '1004143614', '0999421527', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (48, 'Rafa ', 'Pusda', '1004254833', '098252525', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (51, 'Yahit ', 'asa', '1004254833', '098029128', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (60, 'ssaas', 'saas', '1004254833', '1212', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (76, 'jsajjs', 'jsjajsa', '1004688980', '', './uploads/fotos_infractores/jsajjs_jsjajsa_67b563b1f3b62.png');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (77, 'Brandon', 'Cusicasgua', '1101160032', '0874545', './uploads/fotos_infractores/Brandon_Cusicagua_67ba7959deb71.jpg');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (102, 'Andres', 'Arcos', '1709959652', '0878727676', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (103, 'Alex ', 'Alencastro', '0104281639', '1122121', './uploads/fotos_infractores/Alex__Alencastro_67c9a98549b22.png');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (104, 'Alexandra', 'Juma', '1002796769', '', 'uploads/fotos_infractores/Alexandra_Juma_67ce1c4acd2aa.jpg');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (105, 'Andres', 'Salazar', '1712030541', '', 'uploads/fotos_infractores/Andres_Salazar_67ce0acce0a00.png');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (106, 'Juan', 'Rea', '1721147880', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (107, 'Andres ', 'Salaza', '1710873934', '', 'uploads/fotos_infractores/Andres__Salaza_67d451d0c2851.jpg');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (108, 'Juan', 'Linares', '1724354459', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (109, 'Juan Alejandro', 'Perez almeida', '1717795882', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (110, 'Carolina ', 'Tobar Teran', '1751589605', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (111, 'Juana', 'Guevara', '1102865902', '', 'uploads/fotos_infractores/Juana_Guevara_67d4ba5741af5.png');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (112, 'Juano', 'Andres', '1717431728', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (113, 'Nuevo', 'AAAA', '1708720873', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (114, 'yam', 'aaa', '1201529722', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (115, 'yam', 'aaa', '1714721014', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (116, 'yam', 'aaa', '1801330851', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (117, 'vcvvcVC', 'ccxc', '1722640214', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (118, 'yamir', 'Martinez', '1720139995', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (119, 'yamir', 'martinez', '1705256749', '', '');
INSERT INTO `infractores` (`ID_INFRACTOR`, `N_INFRACTOR`, `A_INFRACTOR`, `C_INFRACTOR`, `T_INFRACTOR`, `F_INFRACTOR_RUTA`) VALUES (120, 'juan', 'aaa', '1724356173', '', '');


#
# TABLE STRUCTURE FOR: log_sessions
#

DROP TABLE IF EXISTS `log_sessions`;

CREATE TABLE `log_sessions` (
  `ID_LOG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `NOMBRE_LOG` varchar(50) DEFAULT NULL,
  `FECHA_LOG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_LOG`),
  KEY `FK_REFERENCE_27` (`ID_USUARIO`),
  CONSTRAINT `FK_REFERENCE_27` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: personas
#

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRES` varchar(50) DEFAULT NULL,
  `APELLIDOS` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `CEDULA` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

INSERT INTO `personas` (`ID_PERSONA`, `NOMBRES`, `APELLIDOS`, `EMAIL`, `TELEFONO`, `CEDULA`) VALUES (63, 'Yam', 'Martinez', 'yamirdh@gmail.com', '2555555', '1004254833');
INSERT INTO `personas` (`ID_PERSONA`, `NOMBRES`, `APELLIDOS`, `EMAIL`, `TELEFONO`, `CEDULA`) VALUES (64, 'Rafico', 'Pusda', 'yamirmartinez123@hotmail.com', '09845151511', '1002509964');


#
# TABLE STRUCTURE FOR: placas
#

DROP TABLE IF EXISTS `placas`;

CREATE TABLE `placas` (
  `ID_PLACA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_PLACA` int(11) DEFAULT NULL,
  `PLACA` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_PLACA`),
  KEY `FK_REFERENCE_5` (`ID_TIPO_PLACA`),
  CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_TIPO_PLACA`) REFERENCES `tipos_placas` (`ID_TIPO_PLACA`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (17, 5, 'saassa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (19, 1, 'IJH8723');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (20, 1, 'IJH8723');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (21, 1, '25SAS');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (22, 1, '1ASSASA');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (23, 1, 'jjk876');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (24, 1, 'sassa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (25, 1, 'IBC4585');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (26, 1, 'ASS2222');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (27, 2, '458');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (28, 1, 'sd4522');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (29, 1, 'PDF4562');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (30, 1, 'SSA5555');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (31, 1, 'PDB1245');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (32, 1, 'sasas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (33, 1, 'sasasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (34, 1, 'ssaas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (35, 1, 'dsaassa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (36, 1, '112212');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (37, 1, 'saasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (38, 1, 'aaa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (39, 1, 'sasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (40, 1, 'saas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (41, 1, 'asasas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (42, 1, 'assasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (43, 1, 'saas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (44, 1, 'ssaas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (45, 1, 'asas');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (46, 6, 'Ibc123');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (47, 6, 'Ibc123');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (48, 1, 'assa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (50, 5, 'sSASH667');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (59, 4, 'asasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (62, 2, 'jhg6778');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (63, 1, 'ASA');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (64, 1, '1212');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (65, 1, 'saass');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (66, 1, 'JJAHA78898');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (67, 1, 'pgb7886');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (68, 1, 'SSAD332');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (69, 1, 'SSAD332');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (70, 2, 'ggfg54545');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (71, 1, 'sasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (72, 1, 'sasaa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (73, 2, 'hg7567');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (74, 2, 'RTD567');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (75, 1, 'PDF4587');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (76, 1, 'sasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (77, 1, 'SDR4532');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (78, 1, 'DF4556');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (79, 2, 'AASSD3323');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (80, 2, 'dff443');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (81, 1, 'sasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (82, 1, '12345');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (83, 1, '12345');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (84, 1, 'ASA1254');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (85, 1, 'ASD12154');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (86, 1, '12ASAS');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (87, 1, '12as1sa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (88, 1, 'ASSA');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (89, 2, 'SAS');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (90, 1, 'SSA');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (91, 1, 'ssasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (92, 1, 'sasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (93, 1, 'saasa');
INSERT INTO `placas` (`ID_PLACA`, `ID_TIPO_PLACA`, `PLACA`) VALUES (94, 1, 'sassa');


#
# TABLE STRUCTURE FOR: procesos
#

DROP TABLE IF EXISTS `procesos`;

CREATE TABLE `procesos` (
  `ID_PROCESO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_INFRACTOR` int(11) NOT NULL,
  `ID_PLACA` int(11) NOT NULL,
  `ID_AGENTE` int(11) NOT NULL,
  `RESOLUCION` varchar(30) NOT NULL,
  `FECHA_REGISTRO` datetime NOT NULL,
  PRIMARY KEY (`ID_PROCESO`),
  KEY `FK_REFERENCE_10` (`ID_USUARIO`),
  KEY `FK_REFERENCE_11` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_15` (`ID_PLACA`),
  KEY `FK_REFERENCE_16` (`ID_AGENTE`),
  CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`),
  CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_PLACA`) REFERENCES `placas` (`ID_PLACA`),
  CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`ID_AGENTE`) REFERENCES `tab_agentes` (`ID_AGENTE`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (17, 63, 17, 17, 17, 'Registro de Infractor', '2025-01-27 11:55:26');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (19, 63, 19, 19, 19, 'Registro de Infractor', '2025-01-27 13:15:57');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (20, 63, 20, 20, 20, 'Registro de Infractor', '2025-01-27 13:15:57');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (21, 63, 21, 21, 21, 'Registro de Infractor', '2025-01-27 13:19:46');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (22, 63, 22, 22, 22, 'Registro de Infractor', '2025-01-27 14:46:50');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (23, 63, 23, 23, 23, 'Registro de Infractor', '2025-01-27 18:56:26');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (24, 63, 24, 24, 24, 'Registro de Infractor', '2025-01-27 19:01:09');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (25, 63, 25, 25, 25, 'Registro de Infractor', '2025-01-27 22:13:22');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (26, 63, 26, 26, 26, 'Registro de Infractor', '2025-01-27 22:51:20');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (27, 63, 27, 27, 27, 'Registro de Infractor', '2025-01-28 10:06:44');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (28, 63, 28, 28, 28, 'Registro de Infractor', '2025-01-28 16:56:41');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (29, 63, 29, 29, 29, 'Registro de Infractor', '2025-01-28 17:19:47');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (30, 63, 30, 30, 30, 'Registro de Infractor', '2025-01-29 16:09:23');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (31, 63, 31, 31, 31, 'Registro de Infractor', '2025-02-04 08:34:59');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (32, 63, 32, 32, 32, 'Registro de Infractor', '2025-02-07 10:53:12');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (33, 63, 33, 33, 33, 'Registro de Infractor', '2025-02-07 11:01:22');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (34, 63, 34, 34, 34, 'Registro de Infractor', '2025-02-07 11:48:34');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (35, 63, 35, 35, 35, 'Registro de Infractor', '2025-02-07 12:03:38');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (36, 63, 36, 36, 36, 'Registro de Infractor', '2025-02-07 14:42:52');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (37, 63, 37, 37, 37, 'Registro de Infractor', '2025-02-07 14:44:34');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (38, 63, 38, 38, 38, 'Registro de Infractor', '2025-02-07 14:45:50');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (39, 63, 39, 39, 39, 'Registro de Infractor', '2025-02-07 14:51:38');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (40, 63, 40, 40, 40, 'Registro de Infractor', '2025-02-07 14:59:29');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (41, 63, 41, 41, 41, 'Registro de Infractor', '2025-02-08 17:03:29');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (42, 63, 42, 42, 42, 'Registro de Infractor', '2025-02-08 17:06:20');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (43, 63, 43, 43, 43, 'Registro de Infractor', '2025-02-08 17:07:42');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (44, 63, 44, 44, 44, 'Registro de Infractor', '2025-02-08 17:15:08');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (45, 63, 45, 45, 45, 'Registro de Infractor', '2025-02-08 17:22:34');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (46, 63, 46, 46, 46, 'Registro de Infractor', '2025-02-11 09:30:45');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (47, 63, 47, 47, 47, 'Registro de Infractor', '2025-02-11 09:30:48');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (48, 63, 48, 48, 48, 'Registro de Infractor', '2025-02-14 09:50:30');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (49, 63, 51, 50, 50, 'Registro de Infractor', '2025-02-15 22:17:47');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (54, 63, 60, 59, 27, 'Registro de Infractor', '2025-02-16 13:15:38');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (57, 63, 76, 62, 31, 'Registro de Infractor', '2025-02-20 08:04:13');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (58, 63, 76, 63, 19, 'Registro de Infractor', '2025-02-21 17:59:48');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (59, 63, 76, 64, 17, 'Registro de Infractor', '2025-02-21 18:28:17');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (60, 63, 76, 65, 17, 'Registro de Infractor', '2025-02-21 18:34:47');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (61, 63, 76, 66, 23, 'Registro de Infractor', '2025-02-21 20:28:04');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (62, 63, 77, 67, 17, 'Registro de Infractor', '2025-03-02 12:47:43');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (63, 63, 77, 68, 17, 'Registro de Infractor', '2025-03-03 18:13:37');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (64, 63, 77, 69, 17, 'Registro de Infractor', '2025-03-03 18:26:43');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (65, 63, 77, 70, 20, 'Registro de Infractor', '2025-03-03 18:30:02');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (66, 63, 60, 71, 17, 'Registro de Infractor', '2025-03-03 18:54:33');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (67, 63, 51, 72, 30, 'Registro de Infractor', '2025-03-03 18:56:16');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (68, 63, 102, 73, 17, 'Registro de Infractor', '2025-03-06 08:47:13');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (69, 63, 103, 74, 31, 'Detención', '2025-03-06 08:57:25');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (70, 63, 104, 75, 19, 'Detención', '2025-03-07 12:54:09');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (71, 63, 104, 76, 19, 'Libertad', '2025-03-07 16:51:46');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (72, 63, 104, 77, 19, 'Libertad', '2025-03-07 17:08:03');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (73, 63, 104, 78, 17, 'Libertad', '2025-03-07 21:16:17');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (74, 64, 105, 79, 19, 'Detención', '2025-03-14 10:28:51');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (75, 64, 106, 80, 19, 'Detención', '2025-03-14 10:33:02');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (76, 64, 107, 81, 19, 'Detención', '2025-03-14 10:34:16');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (77, 64, 110, 82, 20, 'Detención', '2025-03-14 10:56:28');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (78, 64, 110, 83, 27, 'Libertad', '2025-03-14 10:58:19');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (79, 64, 111, 84, 21, 'Detención', '2025-03-14 18:21:49');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (80, 64, 111, 85, 19, 'Detención', '2025-03-14 18:57:16');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (81, 64, 111, 86, 19, 'Detención', '2025-03-14 19:01:34');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (82, 64, 110, 87, 22, 'Detención', '2025-03-14 19:15:06');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (83, 64, 110, 88, 20, 'Detención', '2025-03-14 19:17:37');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (84, 64, 109, 89, 19, 'Detención', '2025-03-14 19:19:12');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (85, 64, 110, 90, 20, 'Detención', '2025-03-14 19:20:29');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (86, 64, 108, 91, 19, 'Detención', '2025-03-14 19:26:13');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (87, 64, 108, 92, 35, 'Detención', '2025-03-14 19:29:56');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (88, 64, 112, 93, 17, 'Detención', '2025-03-14 21:23:07');
INSERT INTO `procesos` (`ID_PROCESO`, `ID_USUARIO`, `ID_INFRACTOR`, `ID_PLACA`, `ID_AGENTE`, `RESOLUCION`, `FECHA_REGISTRO`) VALUES (89, 64, 112, 94, 21, 'Detención', '2025-03-15 00:32:37');


#
# TABLE STRUCTURE FOR: pruebas
#

DROP TABLE IF EXISTS `pruebas`;

CREATE TABLE `pruebas` (
  `ID_PRUEBA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_PRUEBA` int(11) NOT NULL,
  `ID_INFRACTOR` int(11) NOT NULL,
  `VALOR_PRUEBA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_PRUEBA`),
  KEY `FK_REFERENCE_14` (`ID_INFRACTOR`),
  KEY `FK_REFERENCE_ID_TIPO_PRUEBA` (`ID_TIPO_PRUEBA`),
  CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`ID_INFRACTOR`) REFERENCES `infractores` (`ID_INFRACTOR`),
  CONSTRAINT `FK_REFERENCE_ID_TIPO_PRUEBA` FOREIGN KEY (`ID_TIPO_PRUEBA`) REFERENCES `tipo_pruebas` (`ID_TIPO_PRUEBA`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (17, 3, 17, 'sassa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (19, 1, 19, '4.5');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (20, 1, 20, '4.5');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (21, 1, 21, '2.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (22, 1, 22, 'SASA');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (23, 1, 23, 'assa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (24, 1, 24, 'saas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (25, 1, 25, '12');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (26, 1, 26, '22');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (27, 1, 27, '1.2');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (28, 1, 28, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (29, 1, 29, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (30, 1, 30, '12.2');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (31, 1, 31, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (32, 1, 32, 'ssaas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (33, 1, 33, 'sasasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (34, 1, 34, 'sasas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (35, 1, 35, 'ssasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (36, 1, 36, 'sasas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (37, 1, 37, 'sassa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (38, 1, 38, 'saaaa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (39, 1, 39, 'saas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (40, 1, 40, '12');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (41, 1, 41, 'sassa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (42, 1, 42, 'sasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (43, 1, 43, 'sasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (44, 1, 44, 'saas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (45, 1, 45, 'sasas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (46, 2, 46, '2');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (47, 2, 47, '2');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (48, 1, 48, 'sasas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (49, 2, 51, 'S121');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (51, 2, 60, 'asa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (52, 1, 76, '9.9');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (53, 1, 76, 'SAA');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (54, 1, 76, '2121');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (55, 1, 76, 'saassa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (56, 1, 76, 'SSAAS');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (57, 1, 77, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (58, 2, 77, 'DF3432');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (59, 2, 77, 'DF3432');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (60, 2, 77, '4');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (61, 1, 60, 'sasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (62, 1, 51, '34');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (63, 1, 102, '988');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (64, 1, 103, '34');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (65, 2, 104, '23.5');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (66, 1, 104, '45.2s');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (67, 1, 104, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (68, 1, 104, '45.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (69, 2, 105, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (70, 1, 106, '12.5');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (71, 1, 107, '12.6');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (72, 1, 110, 'sasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (73, 1, 110, '1212');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (74, 1, 111, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (75, 1, 111, '12.3');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (76, 1, 111, 'SSA');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (77, 1, 110, 'saas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (78, 1, 110, 'SAAS');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (79, 1, 109, 'SAS');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (80, 1, 110, 'SAAS');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (81, 1, 108, 'saas');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (82, 1, 108, 'sasa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (83, 1, 112, 'ssa');
INSERT INTO `pruebas` (`ID_PRUEBA`, `ID_TIPO_PRUEBA`, `ID_INFRACTOR`, `VALOR_PRUEBA`) VALUES (84, 1, 112, 'sassa');


#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `ROL` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `roles` (`ID_ROL`, `ROL`) VALUES (1, 'administrador');
INSERT INTO `roles` (`ID_ROL`, `ROL`) VALUES (2, 'gestor');


#
# TABLE STRUCTURE FOR: tab_agentes
#

DROP TABLE IF EXISTS `tab_agentes`;

CREATE TABLE `tab_agentes` (
  `ID_AGENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRES_ACT` varchar(50) DEFAULT NULL,
  `APELLIDOS_ACT` varchar(50) DEFAULT NULL,
  `NRO_ACT` varchar(20) NOT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_AGENTE`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (17, 'Jose', 'Coral', '745', 0);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (19, 'Jose', 'Agurto', '2547', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (20, 'Jose', 'Armas', '254', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (21, 'JUAN', 'ALMEIDA', '158', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (22, 'LUCAS', 'JAJA', '255', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (23, 'juan', 'Arciniegas', '987', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (24, 'jose', 'Juan', '992', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (25, 'Jose', 'Andrade', '125', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (26, 'AAA', 'SSSS', '898', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (27, 'Sandokan', 'Marin', '125', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (28, 'yamir', 'Martinez', '0145', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (29, ' Yamir', 'Martinez`', '456', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (30, 'Jose', 'Rosales', '125', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (31, 'Juan Andres', 'Carrera Herrera', '456', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (32, 'wqqw', 'wqwq', 'wqw', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (33, 'sasa', 'sassa', 'assasa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (34, 'sassa', 'sasa', 'asas', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (35, 'sasa', 'sasa', 'saas', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (36, 'juli', 'julio', '444', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (37, 'sassa', 'assa', 'saas', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (38, 'jjbhjhj', 'hjh', 'jhhj', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (39, 'sasa', 'sas', 'sasa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (40, 'ssa', 'sasa', 'sa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (41, 'asas', 'asassa', 'sasa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (42, 'asas', 'asas', 'saas', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (43, 'sasa', 'assasa', 'sasa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (44, 'asas', 'asas', 'sasa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (45, '121', '3sa', '132', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (46, 'Yamir', 'Martinez ', '123', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (47, 'Yamir', 'Martinez ', '123', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (48, 'assasa', 'sasa', 'assa', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (50, 'Julian', 'Erazo', '0458', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (51, 'Luis', 'Zambrano', '0155', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (52, 'Juan', 'Riera', '689', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (53, 'Rey', 'Mora', '225', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (54, 'hola', 'gola', '148', 1);
INSERT INTO `tab_agentes` (`ID_AGENTE`, `NOMBRES_ACT`, `APELLIDOS_ACT`, `NRO_ACT`, `ACTIVO`) VALUES (55, 'Hola', 'AAAa', '2587', 1);


#
# TABLE STRUCTURE FOR: tipo_pruebas
#

DROP TABLE IF EXISTS `tipo_pruebas`;

CREATE TABLE `tipo_pruebas` (
  `ID_TIPO_PRUEBA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PRUEBA` varchar(150) NOT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_TIPO_PRUEBA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tipo_pruebas` (`ID_TIPO_PRUEBA`, `NOMBRE_PRUEBA`, `ACTIVO`) VALUES (1, 'Psicosomaticas', 1);
INSERT INTO `tipo_pruebas` (`ID_TIPO_PRUEBA`, `NOMBRE_PRUEBA`, `ACTIVO`) VALUES (2, 'Alcoholemia', 1);
INSERT INTO `tipo_pruebas` (`ID_TIPO_PRUEBA`, `NOMBRE_PRUEBA`, `ACTIVO`) VALUES (3, 'Ninguna', 1);


#
# TABLE STRUCTURE FOR: tipos_placas
#

DROP TABLE IF EXISTS `tipos_placas`;

CREATE TABLE `tipos_placas` (
  `ID_TIPO_PLACA` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO_PLACA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_PLACA`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `tipos_placas` (`ID_TIPO_PLACA`, `TIPO_PLACA`) VALUES (1, 'Blanco/Plata: Particular');
INSERT INTO `tipos_placas` (`ID_TIPO_PLACA`, `TIPO_PLACA`) VALUES (2, 'Naranja: Servicio Publico y Comercial');
INSERT INTO `tipos_placas` (`ID_TIPO_PLACA`, `TIPO_PLACA`) VALUES (3, 'Oro: Organismos del Estado');
INSERT INTO `tipos_placas` (`ID_TIPO_PLACA`, `TIPO_PLACA`) VALUES (4, 'Verde limon: Consejos Provinciales y Municipales');
INSERT INTO `tipos_placas` (`ID_TIPO_PLACA`, `TIPO_PLACA`) VALUES (5, 'Azul: Diplomaticos, Consulares, Asistencia Tecnica, y Organismos Internacionales');
INSERT INTO `tipos_placas` (`ID_TIPO_PLACA`, `TIPO_PLACA`) VALUES (6, 'Rojo: Vehiculos de Internacion Temporal');


#
# TABLE STRUCTURE FOR: usuarios
#

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA` int(11) DEFAULT NULL,
  `USUARIO` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(60) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT 'AC',
  `FOTO` varchar(100) DEFAULT NULL,
  `CAMBIO_PENDIENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_REFERENCE_28` (`ID_PERSONA`),
  CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`ID_PERSONA`) REFERENCES `personas` (`ID_PERSONA`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`ID_USUARIO`, `ID_PERSONA`, `USUARIO`, `PASSWORD`, `ESTADO`, `FOTO`, `CAMBIO_PENDIENTE`) VALUES (63, 63, 'ymartinez', '$2y$10$cUSPLlbgHah3XMIlmDtL4uiYs/vtpDHoJStZ26Hi46hgLsb/gbfu6', 'AC', 'uploads/fotos_usuario/foto_ymartinez_1741924673.png', 0);
INSERT INTO `usuarios` (`ID_USUARIO`, `ID_PERSONA`, `USUARIO`, `PASSWORD`, `ESTADO`, `FOTO`, `CAMBIO_PENDIENTE`) VALUES (64, 64, 'rpusda', '$2y$10$s.zaFNg5zAiW014JUPqcu.tEUghc.gZo.aqVx3Uwjjxp6a3PanSoW', 'AC', 'uploads/fotos_usuario/default_profile.png', 0);


#
# TABLE STRUCTURE FOR: usuarios_roles
#

DROP TABLE IF EXISTS `usuarios_roles`;

CREATE TABLE `usuarios_roles` (
  `ID_USUARIO_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_ROL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO_ROL`),
  KEY `FK_REFERENCE_25` (`ID_USUARIO`),
  KEY `FK_REFERENCE_26` (`ID_ROL`),
  CONSTRAINT `FK_REFERENCE_25` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`),
  CONSTRAINT `FK_REFERENCE_26` FOREIGN KEY (`ID_ROL`) REFERENCES `roles` (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios_roles` (`ID_USUARIO_ROL`, `ID_USUARIO`, `ID_ROL`) VALUES (11, 64, 2);
INSERT INTO `usuarios_roles` (`ID_USUARIO_ROL`, `ID_USUARIO`, `ID_ROL`) VALUES (19, 63, 1);


SET foreign_key_checks = 1;

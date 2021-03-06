PGDMP         6                x            proyecto    12.2    12.2 %    ;           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            <           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            =           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            >           1262    38815    proyecto    DATABASE     �   CREATE DATABASE proyecto WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Colombia.1252' LC_CTYPE = 'Spanish_Colombia.1252';
    DROP DATABASE proyecto;
                postgres    false            �            1255    38882    actualizarnotas()    FUNCTION     �   CREATE FUNCTION public.actualizarnotas() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE 
BEGIN
REFRESH MATERIALIZED VIEW vnotas; 
RETURN null;
end;
$$;
 (   DROP FUNCTION public.actualizarnotas();
       public          postgres    false            �            1259    38819    cortes    TABLE     |   CREATE TABLE public.cortes (
    n_corte integer NOT NULL,
    porcentaje integer NOT NULL,
    cod_cur integer NOT NULL
);
    DROP TABLE public.cortes;
       public         heap    postgres    false            �            1259    38822    cursos    TABLE     �   CREATE TABLE public.cursos (
    cod_cur integer NOT NULL,
    nom_cur character varying(50) NOT NULL,
    semestre integer NOT NULL,
    cod_doc integer NOT NULL,
    pass_cur character varying(10),
    creditos integer
);
    DROP TABLE public.cursos;
       public         heap    postgres    false            �            1259    38825    cursos_cod_cur_seq    SEQUENCE     �   CREATE SEQUENCE public.cursos_cod_cur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.cursos_cod_cur_seq;
       public          postgres    false    203            ?           0    0    cursos_cod_cur_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.cursos_cod_cur_seq OWNED BY public.cursos.cod_cur;
          public          postgres    false    204            �            1259    38827    cursos_estudiantes    TABLE     �   CREATE TABLE public.cursos_estudiantes (
    cod_cur integer NOT NULL,
    cod_est integer NOT NULL,
    periodo character varying NOT NULL
);
 &   DROP TABLE public.cursos_estudiantes;
       public         heap    postgres    false            �            1259    38833    docentes    TABLE     �   CREATE TABLE public.docentes (
    cod_doc integer NOT NULL,
    nom_doc character varying NOT NULL,
    ape_doc character varying NOT NULL,
    usu_doc character varying NOT NULL,
    pass_doc character varying NOT NULL
);
    DROP TABLE public.docentes;
       public         heap    postgres    false            �            1259    38839    estudiantes    TABLE     �   CREATE TABLE public.estudiantes (
    cod_est integer NOT NULL,
    nom_est character varying(50) NOT NULL,
    ape_est character varying(50) NOT NULL,
    usu_est character varying(50) NOT NULL,
    pass_est character varying(50) NOT NULL
);
    DROP TABLE public.estudiantes;
       public         heap    postgres    false            �            1259    38842    notas    TABLE     �   CREATE TABLE public.notas (
    n_corte integer NOT NULL,
    cod_est integer NOT NULL,
    cod_cur integer NOT NULL,
    nota real
);
    DROP TABLE public.notas;
       public         heap    postgres    false            �            1259    38845 	   registros    TABLE     �   CREATE TABLE public.registros (
    id integer NOT NULL,
    "user" character varying(50) NOT NULL,
    fecha character varying(50) NOT NULL,
    hora character varying(50) NOT NULL,
    registro character varying NOT NULL
);
    DROP TABLE public.registros;
       public         heap    postgres    false            �            1259    38851    registros_id_seq    SEQUENCE     �   CREATE SEQUENCE public.registros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.registros_id_seq;
       public          postgres    false    209            @           0    0    registros_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.registros_id_seq OWNED BY public.registros.id;
          public          postgres    false    210            �            1259    38853    vnotas    MATERIALIZED VIEW     �  CREATE MATERIALIZED VIEW public.vnotas AS
 SELECT notas.n_corte,
    notas.nota,
    docentes.nom_doc,
    docentes.ape_doc,
    estudiantes.usu_est,
    cursos.nom_cur
   FROM public.estudiantes,
    public.cursos,
    public.notas,
    public.docentes
  WHERE ((estudiantes.cod_est = notas.cod_est) AND (notas.cod_cur = cursos.cod_cur) AND (cursos.cod_doc = docentes.cod_doc))
  ORDER BY notas.n_corte
  WITH NO DATA;
 &   DROP MATERIALIZED VIEW public.vnotas;
       public         heap    postgres    false    208    203    203    203    206    206    206    207    207    208    208    208            �
           2604    38860    cursos cod_cur    DEFAULT     p   ALTER TABLE ONLY public.cursos ALTER COLUMN cod_cur SET DEFAULT nextval('public.cursos_cod_cur_seq'::regclass);
 =   ALTER TABLE public.cursos ALTER COLUMN cod_cur DROP DEFAULT;
       public          postgres    false    204    203            �
           2604    38861    registros id    DEFAULT     l   ALTER TABLE ONLY public.registros ALTER COLUMN id SET DEFAULT nextval('public.registros_id_seq'::regclass);
 ;   ALTER TABLE public.registros ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209            /          0    38819    cortes 
   TABLE DATA           >   COPY public.cortes (n_corte, porcentaje, cod_cur) FROM stdin;
    public          postgres    false    202   (*       0          0    38822    cursos 
   TABLE DATA           Y   COPY public.cursos (cod_cur, nom_cur, semestre, cod_doc, pass_cur, creditos) FROM stdin;
    public          postgres    false    203   ^*       2          0    38827    cursos_estudiantes 
   TABLE DATA           G   COPY public.cursos_estudiantes (cod_cur, cod_est, periodo) FROM stdin;
    public          postgres    false    205   �*       3          0    38833    docentes 
   TABLE DATA           P   COPY public.docentes (cod_doc, nom_doc, ape_doc, usu_doc, pass_doc) FROM stdin;
    public          postgres    false    206   &+       4          0    38839    estudiantes 
   TABLE DATA           S   COPY public.estudiantes (cod_est, nom_est, ape_est, usu_est, pass_est) FROM stdin;
    public          postgres    false    207   �+       5          0    38842    notas 
   TABLE DATA           @   COPY public.notas (n_corte, cod_est, cod_cur, nota) FROM stdin;
    public          postgres    false    208   \,       6          0    38845 	   registros 
   TABLE DATA           F   COPY public.registros (id, "user", fecha, hora, registro) FROM stdin;
    public          postgres    false    209   �,       A           0    0    cursos_cod_cur_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.cursos_cod_cur_seq', 4, true);
          public          postgres    false    204            B           0    0    registros_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.registros_id_seq', 71, true);
          public          postgres    false    210            �
           2606    38863    cursos cursos_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (cod_cur);
 <   ALTER TABLE ONLY public.cursos DROP CONSTRAINT cursos_pkey;
       public            postgres    false    203            �
           2606    38865    docentes docentes_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (cod_doc);
 @   ALTER TABLE ONLY public.docentes DROP CONSTRAINT docentes_pkey;
       public            postgres    false    206            �
           2606    38867    estudiantes estudiantes_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (cod_est);
 F   ALTER TABLE ONLY public.estudiantes DROP CONSTRAINT estudiantes_pkey;
       public            postgres    false    207            �
           2606    38869    registros registros_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.registros DROP CONSTRAINT registros_pkey;
       public            postgres    false    209            �
           2620    38883    notas actunotas1    TRIGGER     o   CREATE TRIGGER actunotas1 AFTER INSERT ON public.notas FOR EACH ROW EXECUTE FUNCTION public.actualizarnotas();
 )   DROP TRIGGER actunotas1 ON public.notas;
       public          postgres    false    212    208            �
           2620    38884    notas actunotas2    TRIGGER     o   CREATE TRIGGER actunotas2 AFTER DELETE ON public.notas FOR EACH ROW EXECUTE FUNCTION public.actualizarnotas();
 )   DROP TRIGGER actunotas2 ON public.notas;
       public          postgres    false    208    212            �
           2620    38885    notas actunotas3    TRIGGER     o   CREATE TRIGGER actunotas3 AFTER UPDATE ON public.notas FOR EACH ROW EXECUTE FUNCTION public.actualizarnotas();
 )   DROP TRIGGER actunotas3 ON public.notas;
       public          postgres    false    208    212            �
           2606    38871    cortes cortes_cursos_cod_cur_fk    FK CONSTRAINT     �   ALTER TABLE ONLY public.cortes
    ADD CONSTRAINT cortes_cursos_cod_cur_fk FOREIGN KEY (cod_cur) REFERENCES public.cursos(cod_cur);
 I   ALTER TABLE ONLY public.cortes DROP CONSTRAINT cortes_cursos_cod_cur_fk;
       public          postgres    false    2725    202    203            8           0    38853    vnotas    MATERIALIZED VIEW DATA     )   REFRESH MATERIALIZED VIEW public.vnotas;
          public          postgres    false    211    2874            /   &   x�3�440�4�2ҜF\Fʘ�D�%M�b���� w�x      0   r   x�M�1�0@��>ENP�N37`1�+Y�j;�o`@���g����K��8T	e[��\�&	�k����A�"$���]Vv-lAl���<�x�W�!#�]m�@C�Em�y�焈':�$�      2   6   x�3�443 CN##]C.#��P��R׈�E�
!d2�g\U� ���      3   �   x�]���0E�ۏ1�h#�d`vy���T�}m�~��w�g992ۆR��=-?���:9*C1�/:�$F�Z�Le���Xg	i;x8��_��'Fg>�Q��t*T^H%Q�ބ��w4Gh��=�iJ&Űǎh�}V�<Z6�h�B�	sD�      4   |   x�343 CNǼ���bN�Ģ0U���Y���glfh�eUg��_�����^�Z�X�ᙗ�s&���U�p:�$��p���$��y�)��ɥ�*�9=R�*AV�d�V��E��1z\\\ �./*      5   I   x�]���0Cѳ=L�4���V�ܞ>Hl�w��f�m�Y�g+�����{�Q�sGWv5{s�gB���'$      6   `  x�ŘM��6��ү�m�B[�StH�m���h��R`�XJ���\Qn�����X�֐�ݓW��w83��d~(+�D���D��"������}�k����M}
՞�RVm�|2�*}�A�Q�S��{��!��V��燷ݧ x����O��Οv�&#����?M�p����i�����ȨO��^�eU_iq&(��/�bǺ�U+?Z#Ps�c���t��/�'n:�#�X`"P��rm1�[��C���3?^��q�Z=-A&�}��(霂Ab���xX�N���V���X�z1�,M�| ���ԤiP����汨��'��?���&y,�kٴeU���`�4N�4YDS��&��Tj`��s�+��R�� �"��v���1Ww���T��@圬�>[N��4&���I��g��@�}�ހ�& �ܬ�bA�cY�YF��V�t�Է�S�#��ok̜�P��~[r�C2|'B]�����o�����k
a������=�6�ڍo�W�Z=��8�íBP���
�
Aac��N'"ym|�*�Y�r��h�	�<�<%4�����mj���{Y՗p��ى7��9Ro .8�e'��|��x<}:������y}LE0�>���R&�e���V��ܟ
��+���i<��Gt@�O�<	�B�P�V��ҭ(z�bh+��P��&$���N#מչ��r�⳺���X�Y]�H��ys�v�6�c6��p�dY�������3�Ό��p����Dp8���N�'��r���
��������Ô�ި�S#�q0��\O�x�U��EO}�p+MP�<�}�,G\��@H�a����
\��a�����nq��Ԃ���!?:�p�2�gId�A�Ei�>��߂�Ң	����H��Y��Ai�K��f;ŀ8����Yz6Of�q"��KU�d@BU�:}��}N��`���T��]S�e[��]-��~��N���"A�hl�U�������.�1,��8�f����8۴jթ�t(�Ef(�Eg�����?Ju��B���JC�J���Q��CI�t�B��"��!�!w��d�\
�a�L��^�lKf�`9f�ۖ��r	B]rd�������/�3`t     
PGDMP     ,    -                x            proyecto    12.2    12.2     )           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            *           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            +           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ,           1262    24650    proyecto    DATABASE     �   CREATE DATABASE proyecto WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Colombia.1252' LC_CTYPE = 'Spanish_Colombia.1252';
    DROP DATABASE proyecto;
                postgres    false            �            1259    24677    cortes    TABLE     |   CREATE TABLE public.cortes (
    n_corte integer NOT NULL,
    porcentaje integer NOT NULL,
    cod_cur integer NOT NULL
);
    DROP TABLE public.cortes;
       public         heap    postgres    false            �            1259    24695    cursos    TABLE     �   CREATE TABLE public.cursos (
    cod_cur integer NOT NULL,
    nom_cur character varying(50) NOT NULL,
    semestre integer NOT NULL,
    cod_doc integer NOT NULL
);
    DROP TABLE public.cursos;
       public         heap    postgres    false            �            1259    24693    cursos_cod_cur_seq    SEQUENCE     �   CREATE SEQUENCE public.cursos_cod_cur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.cursos_cod_cur_seq;
       public          postgres    false    207            -           0    0    cursos_cod_cur_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.cursos_cod_cur_seq OWNED BY public.cursos.cod_cur;
          public          postgres    false    206            �            1259    24672    cursos_estudiantes    TABLE     �   CREATE TABLE public.cursos_estudiantes (
    cod_cur integer NOT NULL,
    cod_est integer NOT NULL,
    periodo character varying NOT NULL
);
 &   DROP TABLE public.cursos_estudiantes;
       public         heap    postgres    false            �            1259    24656    docentes    TABLE     �   CREATE TABLE public.docentes (
    cod_doc integer NOT NULL,
    nom_doc character varying NOT NULL,
    ape_doc character varying NOT NULL,
    usu_doc character varying NOT NULL,
    pass_doc character varying NOT NULL
);
    DROP TABLE public.docentes;
       public         heap    postgres    false            �            1259    24651    estudiantes    TABLE     �   CREATE TABLE public.estudiantes (
    cod_est integer NOT NULL,
    nom_est character varying(50) NOT NULL,
    ape_est character varying(50) NOT NULL,
    usu_est character varying(50) NOT NULL,
    pass_est character varying(50) NOT NULL
);
    DROP TABLE public.estudiantes;
       public         heap    postgres    false            �            1259    24708    notas    TABLE     �   CREATE TABLE public.notas (
    n_corte integer NOT NULL,
    cod_est integer NOT NULL,
    cod_cur integer NOT NULL,
    nota real,
    id integer NOT NULL
);
    DROP TABLE public.notas;
       public         heap    postgres    false            �            1259    24714    notas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.notas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.notas_id_seq;
       public          postgres    false    208            .           0    0    notas_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.notas_id_seq OWNED BY public.notas.id;
          public          postgres    false    209            �
           2604    24698    cursos cod_cur    DEFAULT     p   ALTER TABLE ONLY public.cursos ALTER COLUMN cod_cur SET DEFAULT nextval('public.cursos_cod_cur_seq'::regclass);
 =   ALTER TABLE public.cursos ALTER COLUMN cod_cur DROP DEFAULT;
       public          postgres    false    206    207    207            �
           2604    24716    notas id    DEFAULT     d   ALTER TABLE ONLY public.notas ALTER COLUMN id SET DEFAULT nextval('public.notas_id_seq'::regclass);
 7   ALTER TABLE public.notas ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    208            "          0    24677    cortes 
   TABLE DATA           >   COPY public.cortes (n_corte, porcentaje, cod_cur) FROM stdin;
    public          postgres    false    205   c       $          0    24695    cursos 
   TABLE DATA           E   COPY public.cursos (cod_cur, nom_cur, semestre, cod_doc) FROM stdin;
    public          postgres    false    207   �       !          0    24672    cursos_estudiantes 
   TABLE DATA           G   COPY public.cursos_estudiantes (cod_cur, cod_est, periodo) FROM stdin;
    public          postgres    false    204                     0    24656    docentes 
   TABLE DATA           P   COPY public.docentes (cod_doc, nom_doc, ape_doc, usu_doc, pass_doc) FROM stdin;
    public          postgres    false    203   E                 0    24651    estudiantes 
   TABLE DATA           S   COPY public.estudiantes (cod_est, nom_est, ape_est, usu_est, pass_est) FROM stdin;
    public          postgres    false    202   �       %          0    24708    notas 
   TABLE DATA           D   COPY public.notas (n_corte, cod_est, cod_cur, nota, id) FROM stdin;
    public          postgres    false    208          /           0    0    cursos_cod_cur_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.cursos_cod_cur_seq', 1, true);
          public          postgres    false    206            0           0    0    notas_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.notas_id_seq', 14, true);
          public          postgres    false    209            �
           2606    24700    cursos cursos_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (cod_cur);
 <   ALTER TABLE ONLY public.cursos DROP CONSTRAINT cursos_pkey;
       public            postgres    false    207            �
           2606    24663    docentes docentes_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (cod_doc);
 @   ALTER TABLE ONLY public.docentes DROP CONSTRAINT docentes_pkey;
       public            postgres    false    203            �
           2606    24655    estudiantes estudiantes_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (cod_est);
 F   ALTER TABLE ONLY public.estudiantes DROP CONSTRAINT estudiantes_pkey;
       public            postgres    false    202            �
           2606    24721    notas notas_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.notas
    ADD CONSTRAINT notas_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.notas DROP CONSTRAINT notas_pkey;
       public            postgres    false    208            "   6   x�%˱  ���8ن������`��)ChC�}�����2mΊ��_      $   T   x�3�tJ,N-VHIUHI,�/�4�447000142�2�t�,�LNT0�4��ps�&���&� ��R�R�3sR���r��qqq ���      !   (   x�3�443000142�420��5�2�2����b���� M}
X          \   x�347000142��J-.-�J�L-��*SI))FF\�PE&�>�9���>�)�y��99]�)�SjbIQfgP~Vb1�S��)����� ��!          R   x�343000142�t�K)J-��M,�Sa�Μٹy�f�F\�Pu&��E��y�e�E��y�9gRJ�����W� &��      %   Z   x�U���0D�3[L����C4`r{��	�KU��B	!�����͘�~�`1��l�����u�]���e��*�-�򅟈�(��{ x  �#,     
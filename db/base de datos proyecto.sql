PGDMP         )                x            proyecto    12.2    12.2                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16393    proyecto    DATABASE     �   CREATE DATABASE proyecto WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Colombia.1252' LC_CTYPE = 'Spanish_Colombia.1252';
    DROP DATABASE proyecto;
                postgres    false            �            1259    24619    cursos    TABLE     �   CREATE TABLE public.cursos (
    id integer NOT NULL,
    nombre character varying(50) NOT NULL,
    cod_prof integer NOT NULL
);
    DROP TABLE public.cursos;
       public         heap    postgres    false            �            1259    24617    cursos_id_seq    SEQUENCE     �   CREATE SEQUENCE public.cursos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.cursos_id_seq;
       public          postgres    false    205                       0    0    cursos_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.cursos_id_seq OWNED BY public.cursos.id;
          public          postgres    false    204            �            1259    24594    estudiantes    TABLE       CREATE TABLE public.estudiantes (
    codigo integer NOT NULL,
    nombre character varying(50) NOT NULL,
    apellido character varying(50) NOT NULL,
    usuario character varying(50) NOT NULL,
    "contraseña" character varying(50) NOT NULL,
    rol integer NOT NULL
);
    DROP TABLE public.estudiantes;
       public         heap    postgres    false            �            1259    24625    notas    TABLE     �   CREATE TABLE public.notas (
    cod_est integer NOT NULL,
    cod_cur integer NOT NULL,
    corte_1 real,
    corte_2 real,
    corte_3 real,
    nota_final real
);
    DROP TABLE public.notas;
       public         heap    postgres    false            �            1259    24612 
   profesores    TABLE       CREATE TABLE public.profesores (
    codigo integer NOT NULL,
    nombre character varying(50) NOT NULL,
    apellido character varying(50) NOT NULL,
    usuario character varying(50) NOT NULL,
    "contraseña" character varying(50) NOT NULL,
    rol integer NOT NULL
);
    DROP TABLE public.profesores;
       public         heap    postgres    false            �
           2604    24622 	   cursos id    DEFAULT     f   ALTER TABLE ONLY public.cursos ALTER COLUMN id SET DEFAULT nextval('public.cursos_id_seq'::regclass);
 8   ALTER TABLE public.cursos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    204    205    205                      0    24619    cursos 
   TABLE DATA           6   COPY public.cursos (id, nombre, cod_prof) FROM stdin;
    public          postgres    false    205   X                 0    24594    estudiantes 
   TABLE DATA           \   COPY public.estudiantes (codigo, nombre, apellido, usuario, "contraseña", rol) FROM stdin;
    public          postgres    false    202   �                 0    24625    notas 
   TABLE DATA           X   COPY public.notas (cod_est, cod_cur, corte_1, corte_2, corte_3, nota_final) FROM stdin;
    public          postgres    false    206   �                 0    24612 
   profesores 
   TABLE DATA           [   COPY public.profesores (codigo, nombre, apellido, usuario, "contraseña", rol) FROM stdin;
    public          postgres    false    203                     0    0    cursos_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.cursos_id_seq', 1, false);
          public          postgres    false    204            �
           2606    24624    cursos cursos_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.cursos DROP CONSTRAINT cursos_pkey;
       public            postgres    false    205            �
           2606    24598    estudiantes estudiantes_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (codigo);
 F   ALTER TABLE ONLY public.estudiantes DROP CONSTRAINT estudiantes_pkey;
       public            postgres    false    202            �
           2606    24616    profesores profesores_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.profesores
    ADD CONSTRAINT profesores_pkey PRIMARY KEY (codigo);
 D   ALTER TABLE ONLY public.profesores DROP CONSTRAINT profesores_pkey;
       public            postgres    false    203               6   x�3�tJ,N-VHIUHI,�/�443000142�2��M,I�M,�LND����� �jC         0   x�343000142��M� ⢜�b3�ݙ3 ;7���ЈӐ+F��� ��
�         0   x�343000142�4�4�3�4�3�4���2�Kq%L`1z\\\ �	         0   x�343000142��J-.-�J�L-��*SI))FF�F\1z\\\ �F     
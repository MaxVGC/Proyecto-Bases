--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

-- Started on 2020-03-01 13:13:44

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 212 (class 1255 OID 38282)
-- Name: actualizarnotas(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.actualizarnotas() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE 
BEGIN
REFRESH MATERIALIZED VIEW vnotas; 
end;
$$;


ALTER FUNCTION public.actualizarnotas() OWNER TO postgres;

--
-- TOC entry 214 (class 1255 OID 38377)
-- Name: retornarcount(text); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.retornarcount(text) RETURNS bigint
    LANGUAGE sql
    AS $_$SELECT reltuples::bigint AS estimate FROM pg_class WHERE oid =$1 ::regclass;$_$;


ALTER FUNCTION public.retornarcount(text) OWNER TO postgres;

--
-- TOC entry 213 (class 1255 OID 38376)
-- Name: retornarcount(character varying); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.retornarcount(character varying) RETURNS bigint
    LANGUAGE sql
    AS $_$SELECT reltuples::bigint AS estimate FROM pg_class WHERE oid =$1 ::regclass;$_$;


ALTER FUNCTION public.retornarcount(character varying) OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 205 (class 1259 OID 24677)
-- Name: cortes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cortes (
    n_corte integer NOT NULL,
    porcentaje integer NOT NULL,
    cod_cur integer NOT NULL
);


ALTER TABLE public.cortes OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 24695)
-- Name: cursos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cursos (
    cod_cur integer NOT NULL,
    nom_cur character varying(50) NOT NULL,
    semestre integer NOT NULL,
    cod_doc integer NOT NULL,
    pass_cur character varying(10),
    creditos integer
);


ALTER TABLE public.cursos OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 24693)
-- Name: cursos_cod_cur_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cursos_cod_cur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_cod_cur_seq OWNER TO postgres;

--
-- TOC entry 2878 (class 0 OID 0)
-- Dependencies: 206
-- Name: cursos_cod_cur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cursos_cod_cur_seq OWNED BY public.cursos.cod_cur;


--
-- TOC entry 204 (class 1259 OID 24672)
-- Name: cursos_estudiantes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cursos_estudiantes (
    cod_cur integer NOT NULL,
    cod_est integer NOT NULL,
    periodo character varying NOT NULL
);


ALTER TABLE public.cursos_estudiantes OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 24656)
-- Name: docentes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.docentes (
    cod_doc integer NOT NULL,
    nom_doc character varying NOT NULL,
    ape_doc character varying NOT NULL,
    usu_doc character varying NOT NULL,
    pass_doc character varying NOT NULL
);


ALTER TABLE public.docentes OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 24651)
-- Name: estudiantes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estudiantes (
    cod_est integer NOT NULL,
    nom_est character varying(50) NOT NULL,
    ape_est character varying(50) NOT NULL,
    usu_est character varying(50) NOT NULL,
    pass_est character varying(50) NOT NULL
);


ALTER TABLE public.estudiantes OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 24708)
-- Name: notas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.notas (
    n_corte integer NOT NULL,
    cod_est integer NOT NULL,
    cod_cur integer NOT NULL,
    nota real
);


ALTER TABLE public.notas OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 24727)
-- Name: registros; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.registros (
    id integer NOT NULL,
    "user" character varying(50) NOT NULL,
    fecha character varying(50) NOT NULL,
    hora character varying(50) NOT NULL,
    registro character varying NOT NULL
);


ALTER TABLE public.registros OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 24725)
-- Name: registros_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.registros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.registros_id_seq OWNER TO postgres;

--
-- TOC entry 2879 (class 0 OID 0)
-- Dependencies: 209
-- Name: registros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.registros_id_seq OWNED BY public.registros.id;


--
-- TOC entry 211 (class 1259 OID 33262)
-- Name: vnotas; Type: MATERIALIZED VIEW; Schema: public; Owner: postgres
--

CREATE MATERIALIZED VIEW public.vnotas AS
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


ALTER TABLE public.vnotas OWNER TO postgres;

--
-- TOC entry 2724 (class 2604 OID 24698)
-- Name: cursos cod_cur; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cursos ALTER COLUMN cod_cur SET DEFAULT nextval('public.cursos_cod_cur_seq'::regclass);


--
-- TOC entry 2725 (class 2604 OID 24730)
-- Name: registros id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.registros ALTER COLUMN id SET DEFAULT nextval('public.registros_id_seq'::regclass);


--
-- TOC entry 2866 (class 0 OID 24677)
-- Dependencies: 205
-- Data for Name: cortes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cortes (n_corte, porcentaje, cod_cur) FROM stdin;
1	100	4
1	10	2
2	10	2
3	80	2
1	100	5
\.


--
-- TOC entry 2868 (class 0 OID 24695)
-- Dependencies: 207
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cursos (cod_cur, nom_cur, semestre, cod_doc, pass_cur, creditos) FROM stdin;
4	Arquitectura de computadores	3	170000004	arq2020	3
5	Matematicas especiales	4	170000003	bdd20200	4
2	Fisica 2	3	170000002	fis2021	4
\.


--
-- TOC entry 2865 (class 0 OID 24672)
-- Dependencies: 204
-- Data for Name: cursos_estudiantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cursos_estudiantes (cod_cur, cod_est, periodo) FROM stdin;
2	160000001	2020-1
2	160000002	2019-2
4	160000002	2020-1
4	160000003	2020-1
5	160000001	2020-1
2	160000003	2020-1
\.


--
-- TOC entry 2864 (class 0 OID 24656)
-- Dependencies: 203
-- Data for Name: docentes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.docentes (cod_doc, nom_doc, ape_doc, usu_doc, pass_doc) FROM stdin;
100000000	Admin	Admin	admin	password
170000003	Beatriz	Rojas	Brojas	bdd2020
170000002	Lilia	Ladino	lladino	bdd2020
170000001	Jesus	Reyes	Jreyes	bdd2020
159239121	Albert	Molano	alad	qppuwueutr
170000004	Nicolas	Castro	Nsegura	bdd2020
\.


--
-- TOC entry 2863 (class 0 OID 24651)
-- Dependencies: 202
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estudiantes (cod_est, nom_est, ape_est, usu_est, pass_est) FROM stdin;
160000001	Andres	Marles	MaxVGC	pkmn3612
160000002	Orion	Guevara	Orion7u7	bdd20200
160000004	Albert	Molano	AladMocu	bdd20200
160000003	Henry	Martinez	Henrro	bdd20200
\.


--
-- TOC entry 2869 (class 0 OID 24708)
-- Dependencies: 208
-- Data for Name: notas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.notas (n_corte, cod_est, cod_cur, nota) FROM stdin;
1	160000002	2	3
2	160000002	2	3
1	160000001	2	5
2	160000001	2	5
1	160000002	4	4
3	160000002	2	5
1	160000003	4	0
3	160000001	2	4
1	160000003	2	0
2	160000003	2	0
3	160000003	2	0
1	160000001	5	3
\.


--
-- TOC entry 2871 (class 0 OID 24727)
-- Dependencies: 210
-- Data for Name: registros; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.registros (id, "user", fecha, hora, registro) FROM stdin;
1	admin	26-02-2020	06:02:38	select * from estudiantes
2	admin	29-02-2020	20:43:19	UPDATE notas SET nota = 5 WHERE cod_cur=2 and cod_est=160000002 and n_corte=3
3	lladino	29-02-2020	20:54:33	UPDATE cortes SET porcentaje = 10 WHERE cod_cur=2 and n_corte=1
4	lladino	29-02-2020	20:54:33	UPDATE cortes SET porcentaje = 10 WHERE cod_cur=2 and n_corte=2
5	lladino	29-02-2020	20:54:33	UPDATE cortes SET porcentaje = 80 WHERE cod_cur=2 and n_corte=3
6	admin	29-02-2020	21:12:07	delete from estudiantes where cod_est=160000004
7	admin	29-02-2020	21:12:07	delete from cursos_estudiantes where cod_est=160000004
8	admin	29-02-2020	21:12:07	delete from notas where cod_est=160000004
9	admin	29-02-2020	08:27:17 pm	delete from estudiantes where cod_est=160000004
10	admin	29-02-2020	08:27:17 pm	delete from cursos_estudiantes where cod_est=160000004
11	admin	29-02-2020	08:27:17 pm	delete from notas where cod_est=160000004
12	admin	29-02-2020	08:55:17 pm	update estudiantes SET nom_est = Henry WHERE cod_est = 160000003
13	admin	29-02-2020	08:55:17 pm	update estudiantes SET ape_est = Martinez WHERE cod_est = 160000003
14	admin	29-02-2020	08:55:17 pm	update estudiantes SET usu_est = Henrro WHERE cod_est = 160000003
15	admin	29-02-2020	08:55:17 pm	update estudiantes SET pass_est = bdd20200 WHERE cod_est = 160000003
16	admin	29-02-2020	09:00:22 pm	update estudiantes set ape_est = 'Martinez' where cod_est = 160000003
17	admin	29-02-2020	09:00:22 pm	update estudiantes set usu_est = 'Henrro' where cod_est = 160000003
18	admin	29-02-2020	09:00:22 pm	update estudiantes set pass_est = 'bdd20200' where cod_est = 160000003
19	lladino	29-02-2020	09:04:05 pm	UPDATE notas SET nota = 5 WHERE cod_cur=2 and cod_est=160000001 and n_corte=3
20	admin	29-02-2020	09:07:20 pm	update estudiantes set nom_est= Henry where cod_est=160000003
21	admin	29-02-2020	09:07:20 pm	update estudiantes set ape_est = Martinez where cod_est = 160000003
22	admin	29-02-2020	09:07:20 pm	update estudiantes set usu_est = Henrro where cod_est = 160000003
23	admin	29-02-2020	09:07:20 pm	update estudiantes set pass_est = bdd20200 where cod_est = 160000003
24	admin	29-02-2020	09:07:32 pm	update estudiantes set nom_est= Henry where cod_est=160000003
25	admin	29-02-2020	09:07:32 pm	update estudiantes set ape_est = Martinez where cod_est = 160000003
26	admin	29-02-2020	09:07:32 pm	update estudiantes set usu_est = Henrro where cod_est = 160000003
27	admin	29-02-2020	09:07:32 pm	update estudiantes set pass_est = bdd20200 where cod_est = 160000003
28	admin	29-02-2020	09:07:47 pm	update estudiantes set nom_est= Henry where cod_est=160000003
29	admin	29-02-2020	09:07:47 pm	update estudiantes set ape_est = Martinez where cod_est = 160000003
30	admin	29-02-2020	09:07:47 pm	update estudiantes set usu_est = henrro where cod_est = 160000003
31	admin	29-02-2020	09:07:47 pm	update estudiantes set pass_est = bdd20200 where cod_est = 160000003
32	admin	29-02-2020	09:20:19 pm	update docentes set nom_doc= Albert where cod_doc=159239121
33	admin	29-02-2020	09:20:19 pm	update docentes set ape_doc = Molano where cod_doc = 159239121
34	admin	29-02-2020	09:20:19 pm	update docentes set usu_doc = alad where cod_doc = 159239121
35	admin	29-02-2020	09:20:19 pm	update docentes set pass_doc = qppuwueutr where cod_est = 159239121
36	henrro	29-02-2020	11:32:14 pm	insert into notas values(1,160000003,4,0)
37	henrro	01-03-2020	12:21:58 am	insert into notas values(1,160000003,1,0)
38	henrro	01-03-2020	12:21:58 am	insert into notas values(2,160000003,1,0)
39	henrro	01-03-2020	12:21:58 am	insert into notas values(3,160000003,1,0)
40	henrro	01-03-2020	12:21:58 am	insert into notas values(4,160000003,1,0)
41	admin	01-03-2020	01:46:20 am	delete from estudiantes where cod_est=160000005
42	admin	01-03-2020	01:46:20 am	delete from cursos_estudiantes where cod_est=160000005
43	admin	01-03-2020	01:46:20 am	delete from notas where cod_est=160000005
44	admin	01-03-2020	01:53:47 am	update estudiantes set nom_est=Henry,ape_est=Martinez,usu_est=Henrro,pass_est=bdd20200 where cod_est=160000003
45	admin	01-03-2020	01:55:32 am	update estudiantes set nom_est=Henry,ape_est=Martinez,usu_est=Henrro,pass_est=bdd20200 where cod_est=160000003
46	admin	01-03-2020	01:58:59 am	update docentes set nom_doc=Nicolas,ape_doc=Castro,usu_doc=Nsegura,pass_doc=bdd2020 where cod_doc=170000004
47	admin	01-03-2020	02:10:55 am	delete from cursos where cod_cur=1
48	admin	01-03-2020	02:10:55 am	delete from notas where cod_cur=1
49	admin	01-03-2020	02:10:55 am	delete from cursos_estudiantes where cod_cur=1
50	admin	01-03-2020	02:10:55 am	delete from cortes where cod_cur=1
51	admin	01-03-2020	02:11:10 am	delete from cursos where cod_cur=1
52	admin	01-03-2020	02:11:10 am	delete from notas where cod_cur=1
53	admin	01-03-2020	02:11:10 am	delete from cursos_estudiantes where cod_cur=1
54	admin	01-03-2020	02:11:10 am	delete from cortes where cod_cur=1
55	admin	01-03-2020	02:11:39 am	delete from cursos where cod_cur=3
56	admin	01-03-2020	02:11:39 am	delete from notas where cod_cur=3
57	admin	01-03-2020	02:11:39 am	delete from cursos_estudiantes where cod_cur=3
58	admin	01-03-2020	02:11:39 am	delete from cortes where cod_cur=3
59	admin	01-03-2020	02:12:48 am	insert into cortes values(1,100,5)
60	admin	01-03-2020	02:18:41 am	update cursos set nom_cur=Fisica 2,semestre=3,cod_doc=170000002,pass_cur=fis2021,creditos=4 where cod_cur=2
61	lladino	01-03-2020	03:30:31 am	UPDATE notas SET nota = 4 WHERE cod_cur=2 and cod_est=160000001 and n_corte=3
62	MaxVGC	01-03-2020	04:10:33 am	insert into notas values(1,160000001,5,0)
63	Henrro	01-03-2020	04:11:58 am	insert into notas values(1,160000003,2,0)
64	Henrro	01-03-2020	04:11:58 am	insert into notas values(2,160000003,2,0)
65	Henrro	01-03-2020	04:11:58 am	insert into notas values(3,160000003,2,0)
66	Brojas	01-03-2020	05:01:05 am	UPDATE notas SET nota = 3 WHERE cod_cur=5 and cod_est=160000001 and n_corte=1
67	Brojas	01-03-2020	05:21:28 am	UPDATE notas SET nota = 4 WHERE cod_cur=5 and cod_est=160000001 and n_corte=1
68	Brojas	01-03-2020	05:24:19 am	UPDATE notas SET nota = 5 WHERE cod_cur=5 and cod_est=160000001 and n_corte=1
69	Brojas	01-03-2020	01:01:49 pm	UPDATE notas SET nota = 3 WHERE cod_cur=5 and cod_est=160000001 and n_corte=1
\.


--
-- TOC entry 2880 (class 0 OID 0)
-- Dependencies: 206
-- Name: cursos_cod_cur_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cursos_cod_cur_seq', 4, true);


--
-- TOC entry 2881 (class 0 OID 0)
-- Dependencies: 209
-- Name: registros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.registros_id_seq', 69, true);


--
-- TOC entry 2731 (class 2606 OID 24700)
-- Name: cursos cursos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (cod_cur);


--
-- TOC entry 2729 (class 2606 OID 24663)
-- Name: docentes docentes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (cod_doc);


--
-- TOC entry 2727 (class 2606 OID 24655)
-- Name: estudiantes estudiantes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT estudiantes_pkey PRIMARY KEY (cod_est);


--
-- TOC entry 2733 (class 2606 OID 24735)
-- Name: registros registros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.registros
    ADD CONSTRAINT registros_pkey PRIMARY KEY (id);


--
-- TOC entry 2735 (class 2620 OID 38283)
-- Name: notas actunotas; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER actunotas AFTER INSERT ON public.notas FOR EACH ROW EXECUTE FUNCTION public.actualizarnotas();


--
-- TOC entry 2734 (class 2606 OID 32917)
-- Name: cortes cortes_cursos_cod_cur_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cortes
    ADD CONSTRAINT cortes_cursos_cod_cur_fk FOREIGN KEY (cod_cur) REFERENCES public.cursos(cod_cur);


--
-- TOC entry 2872 (class 0 OID 33262)
-- Dependencies: 211 2874
-- Name: vnotas; Type: MATERIALIZED VIEW DATA; Schema: public; Owner: postgres
--

REFRESH MATERIALIZED VIEW public.vnotas;


-- Completed on 2020-03-01 13:13:45

--
-- PostgreSQL database dump complete
--


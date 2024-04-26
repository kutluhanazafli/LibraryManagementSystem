--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1
-- Dumped by pg_dump version 15.1

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Adresler; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Adresler" (
    adres_id integer NOT NULL,
    il character varying(100),
    ilce character varying(100),
    mahalle character varying(100),
    cadde character varying(100),
    sokak character varying(100),
    binano character varying(100),
    kat character varying(100),
    postakodu character varying(100)
);


ALTER TABLE public."Adresler" OWNER TO postgres;

--
-- Name: Arsiv; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Arsiv" (
    arsiv_id integer NOT NULL,
    adet integer,
    kitap_id integer,
    kutuphane_id integer
);


ALTER TABLE public."Arsiv" OWNER TO postgres;

--
-- Name: Arsiv_arsiv_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Arsiv_arsiv_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Arsiv_arsiv_id_seq" OWNER TO postgres;

--
-- Name: Arsiv_arsiv_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Arsiv_arsiv_id_seq" OWNED BY public."Arsiv".arsiv_id;


--
-- Name: Emanet; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Emanet" (
    emanet_id integer NOT NULL,
    "emanetTarihi" date,
    "teslimTarihi" date,
    uye_id integer,
    kitap_id integer,
    kutuphane_id integer
);


ALTER TABLE public."Emanet" OWNER TO postgres;

--
-- Name: Emanet_emanet_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Emanet_emanet_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Emanet_emanet_id_seq" OWNER TO postgres;

--
-- Name: Emanet_emanet_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Emanet_emanet_id_seq" OWNED BY public."Emanet".emanet_id;


--
-- Name: Kategoriler; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Kategoriler" (
    kategori_id integer NOT NULL,
    "kategoriAd" character varying(100)
);


ALTER TABLE public."Kategoriler" OWNER TO postgres;

--
-- Name: Kategoriler_kategori_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Kategoriler_kategori_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Kategoriler_kategori_id_seq" OWNER TO postgres;

--
-- Name: Kategoriler_kategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Kategoriler_kategori_id_seq" OWNED BY public."Kategoriler".kategori_id;


--
-- Name: KitapKategori; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."KitapKategori" (
    kitap_id integer,
    kategori_id integer
);


ALTER TABLE public."KitapKategori" OWNER TO postgres;

--
-- Name: KitapYazar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."KitapYazar" (
    kitap_id integer,
    yazar_id integer
);


ALTER TABLE public."KitapYazar" OWNER TO postgres;

--
-- Name: Kitaplar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Kitaplar" (
    kitap_id integer NOT NULL,
    "ISBN" character varying(100),
    "kitapAdi" character varying(100),
    "sayfaSayisi" character varying(100),
    "yayinTarihi" character varying(100),
    "yayinEvi_id" integer
);


ALTER TABLE public."Kitaplar" OWNER TO postgres;

--
-- Name: Kitaplar_kitap_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Kitaplar_kitap_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Kitaplar_kitap_id_seq" OWNER TO postgres;

--
-- Name: Kitaplar_kitap_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Kitaplar_kitap_id_seq" OWNED BY public."Kitaplar".kitap_id;


--
-- Name: Kutuphane; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Kutuphane" (
    kutuphane_id integer NOT NULL,
    "kutuphaneAd" character varying(100),
    adres_id integer
);


ALTER TABLE public."Kutuphane" OWNER TO postgres;

--
-- Name: Uyeler; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Uyeler" (
    uye_id integer NOT NULL,
    "uyeAd" character varying(100),
    "uyeSoyad" character varying(100),
    eposta character varying(100),
    telefon character varying(100),
    cinsiyet integer,
    adres_id integer
);


ALTER TABLE public."Uyeler" OWNER TO postgres;

--
-- Name: YayinEvleri; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."YayinEvleri" (
    "yayinEvi_id" integer NOT NULL,
    "yayinEviAd" character varying(100),
    adres_id integer
);


ALTER TABLE public."YayinEvleri" OWNER TO postgres;

--
-- Name: YayinEvleri_yayinEvi_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."YayinEvleri_yayinEvi_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."YayinEvleri_yayinEvi_id_seq" OWNER TO postgres;

--
-- Name: YayinEvleri_yayinEvi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."YayinEvleri_yayinEvi_id_seq" OWNED BY public."YayinEvleri"."yayinEvi_id";


--
-- Name: Yazarlar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Yazarlar" (
    yazar_id integer NOT NULL,
    "yazarAd" character varying(100),
    "yazarSoyad" character varying(100)
);


ALTER TABLE public."Yazarlar" OWNER TO postgres;

--
-- Name: Yazarlar_yazar_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Yazarlar_yazar_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Yazarlar_yazar_id_seq" OWNER TO postgres;

--
-- Name: Yazarlar_yazar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Yazarlar_yazar_id_seq" OWNED BY public."Yazarlar".yazar_id;


--
-- Name: adresler_adres_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.adresler_adres_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.adresler_adres_id_seq OWNER TO postgres;

--
-- Name: adresler_adres_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.adresler_adres_id_seq OWNED BY public."Adresler".adres_id;


--
-- Name: kutuphane_kutuphane_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kutuphane_kutuphane_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kutuphane_kutuphane_id_seq OWNER TO postgres;

--
-- Name: kutuphane_kutuphane_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kutuphane_kutuphane_id_seq OWNED BY public."Kutuphane".kutuphane_id;


--
-- Name: uyeler_uye_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.uyeler_uye_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uyeler_uye_id_seq OWNER TO postgres;

--
-- Name: uyeler_uye_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.uyeler_uye_id_seq OWNED BY public."Uyeler".uye_id;


--
-- Name: Adresler adres_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Adresler" ALTER COLUMN adres_id SET DEFAULT nextval('public.adresler_adres_id_seq'::regclass);


--
-- Name: Arsiv arsiv_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Arsiv" ALTER COLUMN arsiv_id SET DEFAULT nextval('public."Arsiv_arsiv_id_seq"'::regclass);


--
-- Name: Emanet emanet_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Emanet" ALTER COLUMN emanet_id SET DEFAULT nextval('public."Emanet_emanet_id_seq"'::regclass);


--
-- Name: Kategoriler kategori_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kategoriler" ALTER COLUMN kategori_id SET DEFAULT nextval('public."Kategoriler_kategori_id_seq"'::regclass);


--
-- Name: Kitaplar kitap_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kitaplar" ALTER COLUMN kitap_id SET DEFAULT nextval('public."Kitaplar_kitap_id_seq"'::regclass);


--
-- Name: Kutuphane kutuphane_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kutuphane" ALTER COLUMN kutuphane_id SET DEFAULT nextval('public.kutuphane_kutuphane_id_seq'::regclass);


--
-- Name: Uyeler uye_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Uyeler" ALTER COLUMN uye_id SET DEFAULT nextval('public.uyeler_uye_id_seq'::regclass);


--
-- Name: YayinEvleri yayinEvi_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."YayinEvleri" ALTER COLUMN "yayinEvi_id" SET DEFAULT nextval('public."YayinEvleri_yayinEvi_id_seq"'::regclass);


--
-- Name: Yazarlar yazar_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yazarlar" ALTER COLUMN yazar_id SET DEFAULT nextval('public."Yazarlar_yazar_id_seq"'::regclass);


--
-- Data for Name: Adresler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Adresler" (adres_id, il, ilce, mahalle, cadde, sokak, binano, kat, postakodu) FROM stdin;
30	Ankara	Çankaya	Beştepe	3313	344	3	2	6547
31	İstanbul	Üsküdar	Acıbadem	3312	212	39	5	34565
32	İstanbul	Beşiktaş	Kuruçeşme	1223	12	4	8	34568
28	Kırşehir	Merkez	Atatürk	213	22	12	1	40525
33	Mersin	Akdeniz	Yenimahalle	118	1	1	2	33564
34	İstanbul	Beykoz	Beyoğlu	İstiklal	Meşelik	2	4	34762
21	Mersin	Mersin	Mersin	Mersin	Mersin	5	2	1111
35	Burdur	Yeşilova	Salda	13	5	3	4	15502
36	İstanbul	Ümraniye	Birlik	İstiklal	Coşkun	65	4	34320
\.


--
-- Data for Name: Arsiv; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Arsiv" (arsiv_id, adet, kitap_id, kutuphane_id) FROM stdin;
3	15	6	4
5	11	3	3
6	24	4	4
1	18	3	4
4	23	6	3
2	16	5	3
8	13	7	4
\.


--
-- Data for Name: Emanet; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Emanet" (emanet_id, "emanetTarihi", "teslimTarihi", uye_id, kitap_id, kutuphane_id) FROM stdin;
8	2022-11-24	2022-11-29	9	3	3
9	2022-11-22	2022-11-30	11	7	4
\.


--
-- Data for Name: Kategoriler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Kategoriler" (kategori_id, "kategoriAd") FROM stdin;
5	Bilim
6	Çizgi Roman
7	Mizah
8	Tarih
9	Yabancı Dil
10	Yazılım
11	Edebiyat
\.


--
-- Data for Name: KitapKategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."KitapKategori" (kitap_id, kategori_id) FROM stdin;
3	11
4	11
5	11
6	11
7	11
\.


--
-- Data for Name: KitapYazar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."KitapYazar" (kitap_id, yazar_id) FROM stdin;
3	5
4	13
5	3
6	12
7	14
\.


--
-- Data for Name: Kitaplar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Kitaplar" (kitap_id, "ISBN", "kitapAdi", "sayfaSayisi", "yayinTarihi", "yayinEvi_id") FROM stdin;
3	9786053325017	Korku	80	28-01-1980	6
4	9786052955871	Gizli Bahçe	280	12-02-2005	6
5	9786053327950	Serbest Düşüş	280	01-03-1999	6
6	9786254291975	Kedi Gezegeni	216	12-09-2022	6
7	9789758602230	Sefiller	1724	10-10-1950	4
\.


--
-- Data for Name: Kutuphane; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Kutuphane" (kutuphane_id, "kutuphaneAd", adres_id) FROM stdin;
3	Aşık Paşa	28
4	Mersin İl Halk Kütüphanesi	33
\.


--
-- Data for Name: Uyeler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Uyeler" (uye_id, "uyeAd", "uyeSoyad", eposta, telefon, cinsiyet, adres_id) FROM stdin;
9	Kutluhan	Azaflı	azafli.kutluhan@ogr.ahievran.edu.tr	5555555555	1	21
10	Osman	Öztürk	osmanozturk@gmail.com	5546851452	1	35
11	Kaan	Çilek	kaancilek@gmail.com	05417308631	1	36
\.


--
-- Data for Name: YayinEvleri; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."YayinEvleri" ("yayinEvi_id", "yayinEviAd", adres_id) FROM stdin;
3	Tübitak Yayınları	30
4	Yapı Kredi Yayınları	31
5	Can Yayınları	32
6	İş Bankası Kültür Yayınları	34
\.


--
-- Data for Name: Yazarlar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Yazarlar" (yazar_id, "yazarAd", "yazarSoyad") FROM stdin;
3	William	Golding
4	Franz	Kafka
5	Stefan	Zweig
6	Maksim	Gorki
7	Paul	Celan
8	Oscar	Wilde
9	Jules	Verne
10	Leo	Perutz
11	Jack	London
12	Lao	She
13	Frances Hodgson	Burnett
14	Victor	Hugo
\.


--
-- Name: Arsiv_arsiv_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Arsiv_arsiv_id_seq"', 8, true);


--
-- Name: Emanet_emanet_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Emanet_emanet_id_seq"', 9, true);


--
-- Name: Kategoriler_kategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Kategoriler_kategori_id_seq"', 11, true);


--
-- Name: Kitaplar_kitap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Kitaplar_kitap_id_seq"', 7, true);


--
-- Name: YayinEvleri_yayinEvi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."YayinEvleri_yayinEvi_id_seq"', 6, true);


--
-- Name: Yazarlar_yazar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Yazarlar_yazar_id_seq"', 14, true);


--
-- Name: adresler_adres_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.adresler_adres_id_seq', 36, true);


--
-- Name: kutuphane_kutuphane_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kutuphane_kutuphane_id_seq', 4, true);


--
-- Name: uyeler_uye_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.uyeler_uye_id_seq', 11, true);


--
-- Name: Arsiv Arsiv_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Arsiv"
    ADD CONSTRAINT "Arsiv_pkey" PRIMARY KEY (arsiv_id);


--
-- Name: Emanet Emanet_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Emanet"
    ADD CONSTRAINT "Emanet_pkey" PRIMARY KEY (emanet_id);


--
-- Name: Kategoriler Kategoriler_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kategoriler"
    ADD CONSTRAINT "Kategoriler_pkey" PRIMARY KEY (kategori_id);


--
-- Name: Kitaplar Kitaplar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kitaplar"
    ADD CONSTRAINT "Kitaplar_pkey" PRIMARY KEY (kitap_id);


--
-- Name: YayinEvleri YayinEvleri_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."YayinEvleri"
    ADD CONSTRAINT "YayinEvleri_pkey" PRIMARY KEY ("yayinEvi_id");


--
-- Name: Yazarlar Yazarlar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yazarlar"
    ADD CONSTRAINT "Yazarlar_pkey" PRIMARY KEY (yazar_id);


--
-- Name: Adresler adresler_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Adresler"
    ADD CONSTRAINT adresler_pkey PRIMARY KEY (adres_id);


--
-- Name: Kutuphane kutuphane_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kutuphane"
    ADD CONSTRAINT kutuphane_pkey PRIMARY KEY (kutuphane_id);


--
-- Name: Uyeler uyeler_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Uyeler"
    ADD CONSTRAINT uyeler_pkey PRIMARY KEY (uye_id);


--
-- Name: Uyeler adres_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Uyeler"
    ADD CONSTRAINT adres_id FOREIGN KEY (adres_id) REFERENCES public."Adresler"(adres_id) NOT VALID;


--
-- Name: Kutuphane adres_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kutuphane"
    ADD CONSTRAINT adres_id FOREIGN KEY (adres_id) REFERENCES public."Adresler"(adres_id);


--
-- Name: YayinEvleri adres_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."YayinEvleri"
    ADD CONSTRAINT adres_id FOREIGN KEY (adres_id) REFERENCES public."Adresler"(adres_id);


--
-- Name: KitapKategori kategori_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."KitapKategori"
    ADD CONSTRAINT kategori_id FOREIGN KEY (kategori_id) REFERENCES public."Kategoriler"(kategori_id);


--
-- Name: KitapKategori kitap_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."KitapKategori"
    ADD CONSTRAINT kitap_id FOREIGN KEY (kitap_id) REFERENCES public."Kitaplar"(kitap_id);


--
-- Name: KitapYazar kitap_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."KitapYazar"
    ADD CONSTRAINT kitap_id FOREIGN KEY (kitap_id) REFERENCES public."Kitaplar"(kitap_id);


--
-- Name: Arsiv kitap_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Arsiv"
    ADD CONSTRAINT kitap_id FOREIGN KEY (kitap_id) REFERENCES public."Kitaplar"(kitap_id) NOT VALID;


--
-- Name: Emanet kitap_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Emanet"
    ADD CONSTRAINT kitap_id FOREIGN KEY (kitap_id) REFERENCES public."Kitaplar"(kitap_id);


--
-- Name: Arsiv kutuphane_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Arsiv"
    ADD CONSTRAINT kutuphane_id FOREIGN KEY (kutuphane_id) REFERENCES public."Kutuphane"(kutuphane_id) NOT VALID;


--
-- Name: Emanet kutuphane_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Emanet"
    ADD CONSTRAINT kutuphane_id FOREIGN KEY (kutuphane_id) REFERENCES public."Kutuphane"(kutuphane_id);


--
-- Name: Emanet uye_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Emanet"
    ADD CONSTRAINT uye_id FOREIGN KEY (uye_id) REFERENCES public."Uyeler"(uye_id);


--
-- Name: Kitaplar yayinEvi_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kitaplar"
    ADD CONSTRAINT "yayinEvi_id" FOREIGN KEY ("yayinEvi_id") REFERENCES public."YayinEvleri"("yayinEvi_id") NOT VALID;


--
-- Name: KitapYazar yazar_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."KitapYazar"
    ADD CONSTRAINT yazar_id FOREIGN KEY (yazar_id) REFERENCES public."Yazarlar"(yazar_id);


--
-- PostgreSQL database dump complete
--



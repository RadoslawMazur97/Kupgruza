--
-- PostgreSQL database dump
--

-- Dumped from database version 14.4 (Ubuntu 14.4-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.4

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

DROP DATABASE IF EXISTS d3qe917bnvbuf;
--
-- Name: d3qe917bnvbuf; Type: DATABASE; Schema: -; Owner: lxqvrziddkjssl
--

CREATE DATABASE d3qe917bnvbuf WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.UTF-8';


ALTER DATABASE d3qe917bnvbuf OWNER TO lxqvrziddkjssl;

\connect d3qe917bnvbuf

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
-- Name: historic_advs(); Type: FUNCTION; Schema: public; Owner: lxqvrziddkjssl
--

CREATE FUNCTION public.historic_advs() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    --
    -- Create a row in emp_audit to reflect the operation performed on emp,
    -- making use of the special variable TG_OP to work out the operation.
    --
    IF (TG_OP = 'DELETE') THEN
        INSERT INTO advertisements_historical SELECT 'D', now(), user, OLD.*;
    ELSIF (TG_OP = 'UPDATE') THEN
        INSERT INTO advertisements_historical SELECT 'U', now(), user, NEW.*;
    ELSIF (TG_OP = 'INSERT') THEN
        INSERT INTO advertisements_historical SELECT 'I', now(), user, NEW.*;
    END IF;
    RETURN NULL; -- result is ignored since this is an AFTER trigger
END;
$$;


ALTER FUNCTION public.historic_advs() OWNER TO lxqvrziddkjssl;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: advertisements; Type: TABLE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE TABLE public.advertisements (
    id integer NOT NULL,
    title character varying(100) NOT NULL,
    model character varying(100) NOT NULL,
    description character varying(500) NOT NULL,
    millage numeric(10,0) NOT NULL,
    productionyear numeric(4,0) NOT NULL,
    fuel character varying(20) NOT NULL,
    price numeric(10,2) NOT NULL,
    image character varying(150),
    created_at date NOT NULL,
    id_assigned_by integer NOT NULL,
    city character varying(100) NOT NULL,
    zipcode character varying(6) NOT NULL
);


ALTER TABLE public.advertisements OWNER TO lxqvrziddkjssl;

--
-- Name: Advertisements_idAdvertisements_seq; Type: SEQUENCE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE SEQUENCE public."Advertisements_idAdvertisements_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Advertisements_idAdvertisements_seq" OWNER TO lxqvrziddkjssl;

--
-- Name: Advertisements_idAdvertisements_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lxqvrziddkjssl
--

ALTER SEQUENCE public."Advertisements_idAdvertisements_seq" OWNED BY public.advertisements.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    id_user_details integer NOT NULL,
    user_role integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.users OWNER TO lxqvrziddkjssl;

--
-- Name: Users_idUsers_seq; Type: SEQUENCE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE SEQUENCE public."Users_idUsers_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_idUsers_seq" OWNER TO lxqvrziddkjssl;

--
-- Name: Users_idUsers_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lxqvrziddkjssl
--

ALTER SEQUENCE public."Users_idUsers_seq" OWNED BY public.users.id;


--
-- Name: advertisements_historical; Type: TABLE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE TABLE public.advertisements_historical (
    operation character(1) NOT NULL,
    stamp timestamp without time zone NOT NULL,
    userid text NOT NULL,
    id_primary integer NOT NULL,
    title character varying(100) NOT NULL,
    model character varying(100) NOT NULL,
    description character varying(500) NOT NULL,
    millage numeric(10,0) NOT NULL,
    productionyear numeric(4,0) NOT NULL,
    fuel character varying(20) NOT NULL,
    price numeric(10,2) NOT NULL,
    image character varying(150),
    created_at date NOT NULL,
    id_assigned_by integer NOT NULL,
    city character varying(100) NOT NULL,
    zipcode character varying(6) NOT NULL
);


ALTER TABLE public.advertisements_historical OWNER TO lxqvrziddkjssl;

--
-- Name: users_details; Type: TABLE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE TABLE public.users_details (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    surname character varying(100) NOT NULL,
    phone character varying(20)
);


ALTER TABLE public.users_details OWNER TO lxqvrziddkjssl;

--
-- Name: user_details_id_seq; Type: SEQUENCE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE SEQUENCE public.user_details_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_details_id_seq OWNER TO lxqvrziddkjssl;

--
-- Name: user_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lxqvrziddkjssl
--

ALTER SEQUENCE public.user_details_id_seq OWNED BY public.users_details.id;


--
-- Name: user_role; Type: TABLE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE TABLE public.user_role (
    id integer NOT NULL,
    role character varying(20) NOT NULL
);


ALTER TABLE public.user_role OWNER TO lxqvrziddkjssl;

--
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: public; Owner: lxqvrziddkjssl
--

CREATE SEQUENCE public.user_role_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_role_id_seq OWNER TO lxqvrziddkjssl;

--
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: lxqvrziddkjssl
--

ALTER SEQUENCE public.user_role_id_seq OWNED BY public.user_role.id;


--
-- Name: vlistadmins; Type: VIEW; Schema: public; Owner: lxqvrziddkjssl
--

CREATE VIEW public.vlistadmins AS
 SELECT u.email,
    d.name,
    d.surname,
    ud.role,
    d.phone
   FROM ((public.users u
     LEFT JOIN public.user_role ud ON ((u.user_role = ud.id)))
     LEFT JOIN public.users_details d ON ((u.id_user_details = d.id)))
  WHERE ((ud.role)::text = 'administrator'::text);


ALTER TABLE public.vlistadmins OWNER TO lxqvrziddkjssl;

--
-- Name: vlistusersandroles; Type: VIEW; Schema: public; Owner: lxqvrziddkjssl
--

CREATE VIEW public.vlistusersandroles AS
 SELECT u.email,
    d.name,
    d.surname,
    ud.role,
    d.phone
   FROM ((public.users u
     LEFT JOIN public.user_role ud ON ((u.user_role = ud.id)))
     LEFT JOIN public.users_details d ON ((u.id_user_details = d.id)));


ALTER TABLE public.vlistusersandroles OWNER TO lxqvrziddkjssl;

--
-- Name: vlistusersandtheiradvs; Type: VIEW; Schema: public; Owner: lxqvrziddkjssl
--

CREATE VIEW public.vlistusersandtheiradvs AS
 SELECT ud.name,
    ud.surname,
    u.email,
    a.id,
    a.title,
    a.model,
    a.description,
    a.millage,
    a.productionyear,
    a.fuel,
    a.price,
    a.city,
    a.zipcode
   FROM ((public.advertisements a
     LEFT JOIN public.users u ON ((a.id_assigned_by = u.id)))
     LEFT JOIN public.users_details ud ON ((u.id_user_details = ud.id)))
  ORDER BY u.email;


ALTER TABLE public.vlistusersandtheiradvs OWNER TO lxqvrziddkjssl;

--
-- Name: advertisements id; Type: DEFAULT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.advertisements ALTER COLUMN id SET DEFAULT nextval('public."Advertisements_idAdvertisements_seq"'::regclass);


--
-- Name: user_role id; Type: DEFAULT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.user_role ALTER COLUMN id SET DEFAULT nextval('public.user_role_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public."Users_idUsers_seq"'::regclass);


--
-- Name: users_details id; Type: DEFAULT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.users_details ALTER COLUMN id SET DEFAULT nextval('public.user_details_id_seq'::regclass);


--
-- Data for Name: advertisements; Type: TABLE DATA; Schema: public; Owner: lxqvrziddkjssl
--

INSERT INTO public.advertisements (id, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES (70, 'Jedyny taki Zobacz', 'BMW 3 Series', 'Navi xenon skorzana tapicerka', 180000, 1994, 'Gasoline', 5000.00, 'foto.jpg', '2022-06-27', 22, 'Kielce', '84-822');
INSERT INTO public.advertisements (id, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES (71, 'Zadbany Mercedes', 'Mercedes-Benz E-Class', 'W samochodzie nigdy nie palono', 400000, 1998, 'Diesel', 6000.00, '1c088b92e059e6ddbbf1fa23-6d37cde,750,470,0,0.jpg', '2022-06-27', 22, 'Krakow', '30-587');
INSERT INTO public.advertisements (id, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES (72, 'OKAZJA', 'Other Make and Model', 'Auto idealne na budowe', 320000, 1996, 'Gasoline', 1500.00, 'b835d6754f32a6227d711f5bbda6.jpg', '2022-06-27', 22, 'Warszawa', '00-486');
INSERT INTO public.advertisements (id, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES (73, 'Idealna upalara', 'Mercedes-Benz C-Class', 'perfekcyjny zimowy bojownik', 264352, 1991, 'LPG', 3500.00, 'pobrane.jpg', '2022-06-27', 22, 'Rzeszow', '55-648');


--
-- Data for Name: advertisements_historical; Type: TABLE DATA; Schema: public; Owner: lxqvrziddkjssl
--

INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('U', '2022-06-23 17:14:59.03301', 'lxqvrziddkjssl', 68, 'KupTerazpoLecam', 'Mercedes-Benz C-Class', 'kupteraz', 2132131233, 2005, 'Gasoline', 132123.00, 'b835d6754f32a6227d711f5bbda6.jpg', '2022-06-23', 20, 'Krakow', '31-801');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('I', '2022-06-23 22:05:49.843636', 'lxqvrziddkjssl', 69, 'perelk', 'Mercedes-Benz C-Class', 'zobacz', 123, 1991, 'Gasoline', 123.00, 'foto.jpg', '2022-06-23', 21, 'Krak', '31-803');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('D', '2022-06-27 16:51:24.320034', 'lxqvrziddkjssl', 68, 'KupTerazpoLecam', 'Mercedes-Benz C-Class', 'kupteraz', 2132131233, 2005, 'Gasoline', 132123.00, 'b835d6754f32a6227d711f5bbda6.jpg', '2022-06-23', 20, 'Krakow', '31-801');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('D', '2022-06-27 16:51:27.246367', 'lxqvrziddkjssl', 69, 'perelk', 'Mercedes-Benz C-Class', 'zobacz', 123, 1991, 'Gasoline', 123.00, 'foto.jpg', '2022-06-23', 21, 'Krak', '31-803');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('I', '2022-06-27 16:56:56.823112', 'lxqvrziddkjssl', 70, 'Jedyny taki Zobacz', 'BMW 3 Series', 'Navi xenon skorzana tapicerka', 180000, 1994, 'Gasoline', 5000.00, 'foto.jpg', '2022-06-27', 22, 'Kielce', '84-822');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('I', '2022-06-27 16:57:49.919105', 'lxqvrziddkjssl', 71, 'Zadbany Mercedes', 'Mercedes-Benz E-Class', 'W samochodzie nigdy nie palono', 400000, 1998, 'Diesel', 6000.00, '1c088b92e059e6ddbbf1fa23-6d37cde,750,470,0,0.jpg', '2022-06-27', 22, 'Krakow', '30-587');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('I', '2022-06-27 16:58:36.254245', 'lxqvrziddkjssl', 72, 'OKAZJA', 'Other Make and Model', 'Auto idealne na budowe', 320000, 1996, 'Gasoline', 1500.00, 'b835d6754f32a6227d711f5bbda6.jpg', '2022-06-27', 22, 'Warszawa', '00-486');
INSERT INTO public.advertisements_historical (operation, stamp, userid, id_primary, title, model, description, millage, productionyear, fuel, price, image, created_at, id_assigned_by, city, zipcode) VALUES ('I', '2022-06-27 16:59:34.110913', 'lxqvrziddkjssl', 73, 'Idealna upalara', 'Mercedes-Benz C-Class', 'perfekcyjny zimowy bojownik', 264352, 1991, 'LPG', 3500.00, 'pobrane.jpg', '2022-06-27', 22, 'Rzeszow', '55-648');


--
-- Data for Name: user_role; Type: TABLE DATA; Schema: public; Owner: lxqvrziddkjssl
--

INSERT INTO public.user_role (id, role) VALUES (1, 'regular_user');
INSERT INTO public.user_role (id, role) VALUES (2, 'administrator');
INSERT INTO public.user_role (id, role) VALUES (3, 'moderator');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: lxqvrziddkjssl
--

INSERT INTO public.users (id, email, password, id_user_details, user_role) VALUES (22, 'user@pk.edu', '$2y$10$mDJehMMI90aJ2hBft/vEcOWHuAv0ynesPD3tEwEtA7XVZP6QaTi22', 20, 1);
INSERT INTO public.users (id, email, password, id_user_details, user_role) VALUES (23, 'radek@gmail.com', '$2y$10$gw/4X1afsusoyLvhAe6bDu1JS1H7fOxHq3LOsvLkrHc.JFlly/sVK', 21, 2);


--
-- Data for Name: users_details; Type: TABLE DATA; Schema: public; Owner: lxqvrziddkjssl
--

INSERT INTO public.users_details (id, name, surname, phone) VALUES (20, 'Wojciech', 'Suchodolski', '788546321');
INSERT INTO public.users_details (id, name, surname, phone) VALUES (21, 'Radoslaw', 'Mazur', '785654321');


--
-- Name: Advertisements_idAdvertisements_seq; Type: SEQUENCE SET; Schema: public; Owner: lxqvrziddkjssl
--

SELECT pg_catalog.setval('public."Advertisements_idAdvertisements_seq"', 73, true);


--
-- Name: Users_idUsers_seq; Type: SEQUENCE SET; Schema: public; Owner: lxqvrziddkjssl
--

SELECT pg_catalog.setval('public."Users_idUsers_seq"', 23, true);


--
-- Name: user_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: lxqvrziddkjssl
--

SELECT pg_catalog.setval('public.user_details_id_seq', 21, true);


--
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: lxqvrziddkjssl
--

SELECT pg_catalog.setval('public.user_role_id_seq', 3, true);


--
-- Name: advertisements advertisements_pk; Type: CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.advertisements
    ADD CONSTRAINT advertisements_pk PRIMARY KEY (id);


--
-- Name: users_details user_details_pk; Type: CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.users_details
    ADD CONSTRAINT user_details_pk PRIMARY KEY (id);


--
-- Name: user_role user_role_pk; Type: CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.user_role
    ADD CONSTRAINT user_role_pk PRIMARY KEY (id);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: advertisements_idadvertisements_uindex; Type: INDEX; Schema: public; Owner: lxqvrziddkjssl
--

CREATE UNIQUE INDEX advertisements_idadvertisements_uindex ON public.advertisements USING btree (id);


--
-- Name: user_details_id_uindex; Type: INDEX; Schema: public; Owner: lxqvrziddkjssl
--

CREATE UNIQUE INDEX user_details_id_uindex ON public.users_details USING btree (id);


--
-- Name: user_role_id_uindex; Type: INDEX; Schema: public; Owner: lxqvrziddkjssl
--

CREATE UNIQUE INDEX user_role_id_uindex ON public.user_role USING btree (id);


--
-- Name: user_role_role_uindex; Type: INDEX; Schema: public; Owner: lxqvrziddkjssl
--

CREATE UNIQUE INDEX user_role_role_uindex ON public.user_role USING btree (role);


--
-- Name: users_email_uindex; Type: INDEX; Schema: public; Owner: lxqvrziddkjssl
--

CREATE UNIQUE INDEX users_email_uindex ON public.users USING btree (email);


--
-- Name: users_idusers_uindex; Type: INDEX; Schema: public; Owner: lxqvrziddkjssl
--

CREATE UNIQUE INDEX users_idusers_uindex ON public.users USING btree (id);


--
-- Name: advertisements history; Type: TRIGGER; Schema: public; Owner: lxqvrziddkjssl
--

CREATE TRIGGER history AFTER INSERT OR DELETE OR UPDATE ON public.advertisements FOR EACH ROW EXECUTE FUNCTION public.historic_advs();


--
-- Name: advertisements advertisements_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.advertisements
    ADD CONSTRAINT advertisements_users_id_fk FOREIGN KEY (id_assigned_by) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users details_users___fk; Type: FK CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT details_users___fk FOREIGN KEY (id_user_details) REFERENCES public.users_details(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users user_roles_fk; Type: FK CONSTRAINT; Schema: public; Owner: lxqvrziddkjssl
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_roles_fk FOREIGN KEY (user_role) REFERENCES public.user_role(id);


--
-- Name: DATABASE d3qe917bnvbuf; Type: ACL; Schema: -; Owner: lxqvrziddkjssl
--

REVOKE CONNECT,TEMPORARY ON DATABASE d3qe917bnvbuf FROM PUBLIC;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: lxqvrziddkjssl
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO lxqvrziddkjssl;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO lxqvrziddkjssl;


--
-- PostgreSQL database dump complete
--


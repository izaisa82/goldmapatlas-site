# Map Bundle — Sources & Rights Audit

Sourcing pass to replace the paid didididdah.com downloads with copies whose rights
status can be checked rather than assumed. Completed 30 August 2026.

Every licence below was read from Wikimedia Commons' **raw wikitext licence templates**
via the MediaWiki API, not from the rendered page or a search summary. That distinction
mattered: the rendered page for the Fra Mauro photograph appeared to carry a CC BY-SA
claim, while the actual template on the page is `{{PD-art-old-100-expired}}` with no
attribution condition at all.

Each downloaded file was verified twice — byte count matched the API's reported size
exactly, and the file opened at the reported pixel dimensions. Anything failing either
check was deleted rather than left looking valid. All six passed.

---

## Summary

| # | Map | Downloaded | Resolution | Licence | Confidence |
|---|---|---|---|---|---|
| 1 | Urbano Monte 1587 | **NO** | — | — | ⛔ **could not confirm clean** |
| 2 | Fra Mauro c.1450 | Yes | 8,028 × 8,354 (67.1 MP) | PD-Art | ✅ clean-confirmed |
| 3 | Borgia c.1430 | Yes (×2) | 8,213 × 10,120 (83.1 MP) | **CC0 1.0** | ✅ clean-confirmed |
| 4 | Carta Marina 1539 | Yes (×2) | 13,978 × 10,394 (145.3 MP) | PD-Art | ✅ clean-confirmed |
| 5 | Ebstorf c.1300 | Yes | 7,849 × 7,798 (61.2 MP) | PD-Art | ✅ clean-confirmed |
| 6 | Waldseemüller 1507 | Yes | **29,700 × 16,500 (490.1 MP)** | PD-old-100 | ✅ clean-confirmed¹ |
| 7 | al-Idrisi 1154 | Yes | **37,985 × 15,732 (597.5 MP)** | PD-Art + PD-France | ✅ clean-confirmed |
| 8 | Cantino 1502 | Yes | 10,643 × 4,998 (53.2 MP) | PD-Scan | ✅ clean-confirmed |
| 9 | Piri Reis 1513 | **NO** | — | — | ⛔ **Topkapı asserts copyright** |
| 10 | Mercator 1569 | Yes | 14 sheets, ~38 MP each (531.5 MP total) | PD-France | ✅ clean-confirmed, presented as sheets |

¹ Rights rest on the work's age plus an independently-checked Commons tag on a derivative
of the identical LOC master. LOC's own rights page could not be read — see §6.

**Total on disk: 23 files, 1,022 MB across 8 folders.** Two maps skipped outright
(Urbano Monte, Piri Reis); Mercator complete but deliberately not stitched.

---

## Two corrections to the brief

**The Ebstorf source named in the brief is not clean.** The Internet Archive item
(`dr_monialium-ebstorfensium-...-11458000`) belongs to the David Rumsey collection.
Its own metadata reads:

> `rights: Images may be downloaded and used following Creative Commons CC BY-NC-SA 3.0`
> `license. Image credit should be given to "David Rumsey Map Collection..."`
> `collection: david-rumsey-map-collection`

The 1898 Miller facsimile is indeed old enough to be out of copyright, but the *scan*
Internet Archive serves is Rumsey's, under an explicit non-commercial licence. Replaced
with the Leuphana University version.

**Borgia turned out better than expected, not worse.** The brief anticipated that no
clean high-resolution Borgia might exist. In fact the National Library of Sweden has
released an 83 MP scan under an explicit **CC0 1.0 dedication** — an affirmative rights
grant from the holding institution, which is a stronger position than any PD-Art
assertion elsewhere in this bundle.

---

## 1. Urbano Monte (c. 1587) — ⛔ NOT DOWNLOADED

Every Urbano Monte reproduction on Commons traces back to David Rumsey's 2017 composite
digitisation, including the ones whose source fields do not say so. The 60.3 MP file
credits `exhibits.stanford.edu/nhdmaps`, which is Stanford's National History Day maps
exhibit — built from the Rumsey collection. The 9 MP "alternative" credits an Atlas
Obscura image, and its own file page links to Rumsey's blog and LUNA record.

The original is at the Biblioteca Ambrosiana, Milan, which has not published open
high-resolution imaging.

Full detail, including every candidate checked and the options if you want to proceed
anyway: `01 Urbano Monte 1587/NOT-DOWNLOADED-read-me.md`

---

## 2. Fra Mauro (c. 1450) — ✅ CLEAN

**`FraMauro_Marciana_Descouens.jpg`** — 8,028 × 8,354 (67.1 MP), 80.4 MB

- Commons: https://commons.wikimedia.org/wiki/File:(Venice)_Fra%27Mauro%27s_World_Map_-_Biblioteca_Nazionale_Marciana.jpg
- Licence template: `{{PD-art-old-100-expired}}`
- Photographer: Didier Descouens (Wikimedia volunteer), taken 12 May 2023
- Holding institution: Biblioteca Nazionale Marciana, Venice

Chosen because no institution's scan sits underneath it. A Commons volunteer photographed
the map in the museum, so there is no third-party imaging rights claim to conflict with —
the cleanest provenance of any Fra Mauro copy available.

### Higher resolution exists, but not clean — your call

Commons also hosts a **4.9 gigapixel** Fra Mauro (`File:Fra Mauro Map.png`, 77,056 ×
63,684, 4.68 GB), plus 3.6 GP and 3.5 GP JPEG variants. All are tagged
`{{PD-US-expired}}{{PD-old-70}}` with no CC restriction — but all were scraped with
`dezoomify-rs` from **Factum Arte's** high-resolution viewer. Factum Arte publishes no
public rights statement I could retrieve (their site returned 429 to every request).

That is structurally the same situation as Rumsey: a modern organisation's photography of
a public-domain original, re-tagged PD on Commons. I applied the same standard to both and
did not download it. Flagging it because 4.9 GP versus 67 MP is a 73× difference in pixels
and you may judge the risk differently — that is a business decision, not a technical one.

For scale: the copy you bought is 2.48 GP, so the Factum version is roughly **twice the
resolution of your paid file**.

---

## 3. Borgia Map (c. 1430) — ✅ CLEAN (strongest in the bundle)

**`Borgia_Apographon_KB-Sweden.tif`** — 8,213 × 10,120 (83.1 MP), 475.6 MB TIFF

- Commons: https://commons.wikimedia.org/wiki/File:Apographon_descriptionis_Orbis_terrae_figuris_et_narratiunculis_distinctae_manu_Germanica_opere_nigelliari_discolorio_circa_medium_saec._XV._tabulae_aeneae_Musei_Borgiani_Veltris_consignatae_..._-_Kungliga_Biblioteket_-_10371621.tif
- Licence: **CC0 1.0 Universal Public Domain Dedication** — https://creativecommons.org/publicdomain/zero/1.0/
- Provider: National Library of Sweden (Kungliga Biblioteket), from its digital collections

The only file here with an explicit institutional rights *grant* rather than a Commons
PD-Art *assertion*. CC0 is an affirmative worldwide waiver, which removes the ambiguity
that hangs over every PD-Art item. Uncompressed TIFF, so it is also the highest-quality
master in the bundle.

Note on what it depicts: this is the **1797 engraved facsimile** ("Apographon...") of the
Borgia map, not a photograph of the original copper plate. The facsimile is itself long
out of copyright. It is a legitimate and commonly-used representation, but say so in your
listing rather than implying it is a photograph of the Vatican original.

**`Borgia_Original_Vatican.jpg`** — 4,692 × 4,506 (21.1 MP), 5.6 MB

- Commons: https://commons.wikimedia.org/wiki/File:Mapa_de_Borgia_XV.jpg
- Licence: Public domain · Credit: Biblioteca Apostolica Vaticana

The actual original object, in colour. Lower resolution, included so you have both the
detailed engraving and a true-colour reference of the real artefact.

---

## 4. Carta Marina (Olaus Magnus, 1539) — ✅ CLEAN

**`CartaMarina_1539_full.png`** — 13,978 × 10,394 (145.3 MP), 88.2 MB

- Commons: https://commons.wikimedia.org/wiki/File:CartaMarina.png
- Licence template: `{{PD-Art|PD-old-100-expired}}`
- Source: `cipher.uiah.fi` (university course materials, Helsinki)

Highest-resolution Carta Marina available anywhere I could reach. The source is a
university teaching page rather than a rights-asserting institution, so there is no
competing licence claim over it.

**`CartaMarina_1539_BnF.jpg`** — 6,752 × 4,968 (33.5 MP), 7.6 MB

- Commons: https://commons.wikimedia.org/wiki/File:Carta_marina_et_descriptio_septemtrionalium_terrarum..._-_btv1b53057716x.jpg
- Licence: Public domain · Credit: Bibliothèque nationale de France

Lower resolution but with clean, named institutional provenance. Included as the citable
version if you ever need to point at a named library rather than a course page.

### Library of Congress — could not retrieve

The LOC item named in the brief (https://www.loc.gov/item/2021668418/, "no known
restrictions") is genuinely the most explicitly rights-cleared source for this map, but
**loc.gov returned HTTP 403 to every automated request** from this machine — the JSON API
and the tile service alike, with and without full browser headers. It blocks non-interactive
clients.

If you want the LOC copy, open that URL in a normal browser and use its own download
menu. Worth knowing before you bother: the Commons file above is 145 MP, which is likely
to exceed what LOC offers anyway.

---

## 5. Ebstorf Map (c. 1300) — ✅ CLEAN

**`Ebstorf_Weltkarte_Leuphana.jpg`** — 7,849 × 7,798 (61.2 MP), 28.7 MB

- Commons: https://commons.wikimedia.org/wiki/File:Ebstorfer_Weltkarte_2.jpg
- Licence template: `{{PD-Art|PD-old-100-expired}}`
- Source: Leuphana University Lüneburg, EbsKart project — https://warnke.web.leuphana.de/hyperimage/EbsKart/

Replaces the Internet Archive item named in the brief, which is a Rumsey scan under
CC BY-NC-SA (see "Two corrections" above). The original Ebstorf map burned in Hanover in
1943, so every surviving image descends from pre-war facsimiles; this one comes from a
university research project with no commercial restriction attached.

---

## Standing caveats

**On PD-Art generally.** Four of the six files rest on the position that a faithful
photograph of a flat public-domain artwork creates no new copyright — the rule from
*Bridgeman v. Corel* (US, 1999), and since 2019 also the direction of EU law under
Article 14 of the Digital Single Market directive. This is the position Wikimedia Commons
operates on. It is well established but it is a legal position, not a licence grant, and
it has been contested by some institutions. The Borgia CC0 file is the one item here that
does not depend on it at all.

I am not a lawyer and none of this is legal advice. For a product you intend to sell,
a short review by someone who is would be money well spent — particularly on the Fra
Mauro / Factum Arte question, where the resolution difference is large enough to matter
commercially.

**On the maps you already bought.** The two `.jp2` files in `Fra Mauro Map/` came from
didididdah.com. Their Readme points at David Rumsey's own viewer as the "online version",
and the 3.86 GP file is the Urbano Monte planisphere — meaning both purchased files appear
to be Rumsey-derived. Buying a file is not the same as acquiring the right to resell it.
The bundle in this folder exists precisely so you do not have to rely on them.

---

# Round 2 — 31 August 2026

Second sourcing pass: five additional maps, plus a re-check of Carta Marina against the
Library of Congress. Same standard as round 1 — licence read from raw wikitext, never from
the rendered page; institutional CC0 / "free to use" preferred over the PD-Art doctrine
where a choice existed.

**Two more false positives caught**, both the same shape as the Ebstorf one from round 1:
a public-domain tag covering the *age of the original artwork*, sitting on top of a *modern
reproduction* that has its own live rights claim.

---

## Task 1 — Carta Marina: the LOC copy is a different map

**Verdict: no swap, and not usable as a backup either. The LOC item is a different edition.**

The brief expected the LOC copy to be the same map, possibly at better resolution, with a
stronger rights citation. It is not the same map.

LOC item 2021668418 is the **second edition — the 1572 Antoine Lafréry printing** — described
as "a map on 2 sheets joined together: copper engraving, color, **52 × 79 cm**".

The file already in this bundle is the **1539 first edition**. Its aspect ratio (13,978 ×
10,394 = 1.345:1) matches the 1539 original's physical proportions of roughly 1.25 × 1.70 m
(1.36:1). The LOC sheet at 52 × 79 cm is a different, much smaller object — a reduction
published 33 years later, not a higher-resolution scan of the same thing.

It therefore cannot "match or beat" the current file, because it is not the same artefact.
Listing it as an equivalent alternate source would have been wrong.

**Separately, loc.gov is unreachable from this machine.** The item page, the JSON API, and a
real browser session all returned HTTP 403 or a Cloudflare challenge. I could not read LOC's
rights statement firsthand, so I am not quoting it as verified.

What I *could* reach is `tile.loc.gov`, LOC's image delivery service, which serves IIIF
metadata and master files without the block — that is how the Waldseemüller master below was
obtained. Without the item JSON I could not determine the Carta Marina resource id, so no LOC
Carta Marina asset was retrieved.

---

## 6. Waldseemüller (1507) — SOURCED · the largest single file in the bundle

**`Waldseemuller_1507_LOC.jp2`** — 29,700 × 16,500 (**490.1 MP**), 73.8 MB JPEG 2000

- Library of Congress, Geography and Map Division · call number `g3200.ct000725`
- Master: https://tile.loc.gov/storage-services/service/gmd/gmd3/g3200/g3200/ct000725.jp2
- IIIF: https://tile.loc.gov/image-services/iiif/service:gmd:gmd3:g3200:g3200:ct000725/info.json
- Item page: https://www.loc.gov/item/2003626426/

"America's birth certificate" — the first map to use the name America. Only one copy
survives; LOC bought it in 2001.

**How this was identified.** The resource id in the brief turned out to belong to a
different item, so I did not take it on trust. I pulled a small IIIF derivative and looked
at it: unmistakably the Waldseemüller — twelve sheets, Ptolemy and Vespucci portraits across
the top, the *VNIVERSALIS COSMOGRAPHIA* caption along the bottom. LOC's IIIF service
independently reports 29,700 × 16,500 and the downloaded JP2 opens at exactly those
dimensions.

Independently corroborated on Commons: `File:Waldseemuller map, complete.jpg` is the same
29,700 × 16,500 image, its description states it was "Converted from the **LoC's JPEG2000
file**", and it cites `gmd3/g3200/g3200/ct000725.jp2` — the same master. That page carries
`{{PD-old-100}}`, read from raw wikitext.

**The honest caveat.** Because loc.gov is blocked here, I never read LOC's own "free to use
and reuse" statement myself. The rights position rests on two things I did verify: the work
is from 1507 and Waldseemüller died c. 1520, and the identical master carries an
independently-checked `{{PD-old-100}}` tag on Commons. If you want LOC's statement on
record, open the item page in a normal browser and capture it.

**Format note:** this is LOC's original JPEG 2000 master. The widely-circulated Commons JPEG
was re-encoded at 81% quality to fit under a 100 MB upload cap; this file has not been.

---

## 7. al-Idrisi, Tabula Rogeriana (1154) — SOURCED · highest resolution in the bundle

**`AlIdrisi_TabulaRogeriana_BnF.jpg`** — 37,985 × 15,732 (**597.5 MP**), 107.4 MB

- Bibliothèque nationale de France, département Cartes et plans · shelfmark **GE AA-2004**
- Licence templates: `{{PD-Art|PD-old-100-expired}}` + `{{PD-France}}` + `{{PD-US-expired}}`

Three independent public-domain tags, a named institution and a real shelfmark — the
strongest tag stack of any PD-Art item in this bundle.

**State this accurately in any listing.** The file's own date field reads *19th century*. It
is a 19th-century engraved reproduction of al-Idrisi's world map, not a photograph of the
1154 manuscript. It is the standard scholarly reproduction and entirely legitimate to sell,
but describing it as "the 1154 original" would be false.

Bodleian was also considered, as the brief asked. Digital Bodleian applies CC-BY-NC terms to
much of its collection — non-commercial, therefore unusable here — and nothing there beat
597 MP, so the BnF copy won on both rights and resolution.

**Runner-up, rejected:** `Konrad Miller, Charta Rogeriana...` (23,882 × 11,020, 263 MP,
National Library of Israel / Eran Laor Collection) is tagged only `{{PD-old-assumed}}` —
Commons *assuming* public-domain status rather than establishing it. Weaker footing and
lower resolution, so it was not used.

---

## 8. Cantino Planisphere (1502) — SOURCED

**`Cantino_Planisphere_Estense.jpg`** — 10,643 × 4,998 (53.2 MP), 36.0 MB

- Biblioteca Estense Universitaria, Modena
- Licence template: `{{PD-Scan|PD-old-100}}`

`PD-Scan` asserts that a straight scan of a public-domain original creates no new copyright
— the same doctrine family as PD-Art. A Commons featured picture, with the holding
institution named as source. Visually confirmed: the 1502 Portuguese planisphere with the
Tordesillas line, Brazil, and the full ring of compass roses.

No Italian institutional open-licence release was found, so this rests on the PD-Scan
doctrine rather than an explicit grant.

---

## 9. Piri Reis (1513) — SKIPPED · the holding museum asserts copyright

**Not downloaded.** UNESCO's own Memory of the World documentation — the source the brief
asked me to check — states:

> "Copyright of this object belongs to the **Topkapı Palace Museum** and is subject to the
> terms of the Copyright Law no: 4110 (dated 1995) and the directive about copying and photo
> shooting of objects in museums and historical sites."

That is an affirmative rights claim published by the authority that inscribed the map, not
an absence of evidence.

Every Commons candidate compounds it: the best is 5.7 MP, tagged `{{PD-old-100}}` — which
covers the 1513 artwork's age and says nothing about the photograph — and sourced to the very
museum asserting copyright. Others credit `ufonetwork.it` or `erisi.com`. One is CC BY-SA
4.0, unusable for closed commercial resale.

Even ignoring rights, 5.7 MP would sit roughly an order of magnitude below everything else
here. Full detail: `09 Piri Reis 1513/NOT-DOWNLOADED-read-me.md`

---

## 10. Mercator (1569) — COMPLETE · 14 sheets, deliberately not stitched

**The obvious candidate was rejected.** `File:Mercator 1569 world map composite.jpg`
(5,433 × 3,450) is the one-file whole-map version in general circulation. Its raw wikitext
reads:

> "Basel copy of the 1569 world map photographed by Wilhelm Krücken. **He holds the copyright
> for the high definition photographs** but he permits use of these medium resolution scans."

A named living rightsholder claiming copyright, plus an informal "permits use" that specifies
no licence, no scope and no conditions. The `{{PD-old-100}}` tag on that page covers
Mercator's engraving, not Krücken's photographs. Not something to build a paid product on.

**Used instead:** the BnF copy, shelfmark **GE A-1064 (RES)**, digitised by the library and
uploaded as 14 sheets. Raw wikitext carries `{{PD-France}}` + `{{PD-US-expired}}` with no
photographer claim. About 38 MP per sheet — roughly 530 MP combined, against the 18.7 MP
composite that was rejected.

**All 14 sheets are now downloaded and verified** (1 September 2026). The earlier run tripped
Wikimedia's rate limiter; the completing run made exactly one request per sheet with a fixed
25-second pause between them and received HTTP 200 every time, no 429. Same verification as
before: byte count against the API plus a re-open confirming the exact pixel dimensions.

### Why they are shown as sheets rather than stitched

The brief allowed stitching **if** a documented sheet-layout grid exists for this edition.
It does not, for this particular set, and the evidence is visible in the scans themselves:

- The literature describes Mercator's 1569 wall map as **18 sheets in a 6 × 3 grid**. The BnF
  digitisation is **14 images**, so it is not that decomposition.
- The 14 split into **5 portrait** scans (~5,300 × 7,100) and **9 landscape** scans
  (~7,100 × 5,400). A single uniform grid cannot produce both orientations.
- A contact sheet of all 14 shows the title banner running continuously across the tops of
  sheets 01–05 — "NOVA ET AVCTA O…", "…A ORBIS TERRAE DESCRIP…", "…RIPTIO AD VSVM NA…" — so
  those five are the top row, left to right. That is the *only* relationship determinable
  from the images. Nothing fixes the vertical registration or the overlaps of 06–14.
- Several scans carry black scanner margins and fold-over edges, so even the sheet
  boundaries are not clean crops of the printed sheets.

These are scans of this copy **as mounted**, at sizes convenient to BnF's scanner — not the
printer's sheets. Stitching them would mean inventing offsets, and a wrong stitch looks
authoritative while being false. Same discipline as the Urbano Monte skip: document the
limit rather than fabricate past it.

All 14 are in the viewer as one Mercator entry with a sheet picker, each independently
deep-zoomable.

**No clean composite exists.** Stitching the sheets is real image-processing work — irregular
overlaps, differential paper warp, and a graticule that must line up or the seams show at
zoom. See `10 Mercator 1569/NO-COMPOSITE-read-me.md`.

---

## Round 2 verification method

Identical to round 1. Licence templates read from raw wikitext via the MediaWiki API, never
from the rendered page or a search summary. Every download checked against the API's byte
count and re-opened to confirm it decodes at the reported pixel dimensions.

That check earned its keep this round. When Wikimedia's rate limiter engaged, about ten
"downloads" were actually 2 KB error pages. Every one was detected and deleted
automatically. No corrupt file was left behind looking valid.

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <link rel="stylesheet" href="stile.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <script>
            esDisp = false;
            cbDisp = false;
            crDisp = false;
            guDisp = false;
            ptDisp = false;
            waDisp = false;
            baDisp = false;
            hbDisp = false;
            hiDisp = false;
            hcDisp = false;
            fbDisp = false;
            bgDisp = false;
            hpDisp = false;
            chDisp = false;
            tgDisp = false;
            hdDisp = false;
            ldDisp = false;
            vlDisp = false;

            function setEsame(val) {
                if(val == 'el'){
                    strEs = "'addE'";
                    document.getElementById("el").innerHTML = '<div class="mb-3 row">\
                        <label for="dataV" class="col-sm-2 col-form-label">Data visita</label>\
                        <div class="col-sm-10">\
                            <input type="date" class="form-control" id="dataV" name="dataV" required>\
                        </div>\
                    </div>\
                    <div class="mb-3 row">\
                        <label for="cbc" class="col-sm-2 col-form-label">Aggiungi esame</label>\
                        <div class="col-sm-9">\
                            <select class="form-select" name="addE" id="addE" required>\
                                <option selected>Seleziona</option>\
                                <option value="esr">Erythrocyte Sedimentation Rate (ESR)</option>\
                                <option value="cbc">Complete Blood Count (CBC)</option>\
                                <option value="crp">C~ Reactive Protein (CRP)</option>\
                                <option value="gue">General Urine Examination (GUE)</option>\
                                <option value="pt">Pregnant Test (PT)</option>\
                                <option value="wat">Widal Agglutination Test (WAT) </option>\
                                <option value="bat">Brucella Agglutination Test (BAT)</option>\
                                <option value="hbs">Hepatitis B (HBS)</option>\
                                <option value="hiv">Human immune deficiency virus (HIV)</option>\
                                <option value="hcv">Hepatitis C (HCV)</option>\
                                <option value="fbs">Fasting Blood Sugar (FBS)</option>\
                                <option value="bg">Blood group (BG)</option>\
                                <option value="hpylori">Helicobacter Pylori (H pylori)</option>\
                                <option value="cho">Changes in plasma levels of cholesterol (CHO)</option>\
                                <option value="tg">triglyceride (TG)</option>\
                                <option value="hdl">high density lipoprotein (HDL)</option>\
                                <option value="ldl">low density lipoprotein (LDL)</option>\
                                <option value="vldl">very low density lipoprotein (VLDL)</option>\
                            </select>\
                        </div>\
                        <div class="col-sm-1">\
                            <button type="button" class="btn btn-primary" onclick="setEsLab(document.getElementById('+strEs+').value);" id="plus" name="plus">+</button>\
                        </div>\
                    </div>\
                    \
                    <div id="esr"></div>\
                    <div id="cbc"></div>\
                    <div id="crp"></div>\
                    <div id="gue"></div>\
                    <div id="pt"></div>\
                    <div id="wat"></div>\
                    <div id="bat"></div>\
                    <div id="hbs"></div>\
                    <div id="hiv"></div>\
                    <div id="hcv"></div>\
                    <div id="fbs"></div>\
                    <div id="bg"></div>\
                    <div id="hpylori"></div>\
                    <div id="cho"></div>\
                    <div id="tg"></div>\
                    <div id="hdl"></div>\
                    <div id="ldl"></div>\
                    <div id="vldl"></div>\
                    <div class="mb-3 row">\
                        <div class="input-group">\
                            <span class="input-group-text">Note</span>\
                            <textarea class="form-control" name="noteV" aria-label="With textarea" rows="10" style="height:100%;"></textarea>\
                        </div>\
                    </div>\
                    <input type="submit" class="btn btn-primary btn-lg" name="subES">';
                }
                else{
                    document.getElementById("el").innerHTML = '';
                }

                if(val == 'ecg' || val == 'rg' || val == 'eg' || val == 'tac' || val == 'rm'){
                    document.getElementById("esLab").innerHTML = '<div class="mb-3 row">\
                        <label for="dataV" class="col-sm-2 col-form-label">Data visita</label>\
                        <div class="col-sm-10">\
                            <input type="date" class="form-control" id="dataV" name="dataV" required>\
                        </div>\
                    </div>\
                    <div class="mb-3 row">\
                        <div class="input-group mb-3">\
                            <input type="file" class="form-control" id="inputFile" name="file[]" multiple="multiple" required>\
                            <label class="input-group-text" for="inputFile">Upload</label>\
                        </div>\
                    </div>\
                    <div class="mb-3 row">\
                        <div class="input-group">\
                            <span class="input-group-text">Note</span>\
                            <textarea class="form-control" name="noteV" aria-label="With textarea" rows="10" style="height:100%;"></textarea>\
                        </div>\
                    </div>\
                    <input type="submit" class="btn btn-primary btn-lg" name="subFile">';
                }
                else{
                    document.getElementById("esLab").innerHTML = '';
                }
            }

            function setEsLab(val){
                str = "'"+val+"'";
                if(val == 'esr'){
                    if (!esDisp){
                        esDisp = true;
                        document.getElementById("esr").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="esr">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Erythrocyte Sedimentation Rate (ESR)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="esrval" class="col-sm-3 col-form-label">Erythrocyte Sedimentation Rate</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="esrval" name="esrval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'cbc'){
                    if (!cbDisp){
                        cbDisp = true;
                        document.getElementById("cbc").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="cbc">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Complete Blood Count (CBC)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="redbloodcells" class="col-sm-3 col-form-label">Red blood cells</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="redbloodcells" name="redbloodcells" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="whitebloodcells" class="col-sm-3 col-form-label">White blood cells</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="whitebloodcells" name="whitebloodcells" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hemoglobin" class="col-sm-3 col-form-label">Hemoglobin</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="hemoglobin" name="hemoglobin" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hematocrit" class="col-sm-3 col-form-label">Hematocrit</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="hematocrit" name="hematocrit" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="platelets" class="col-sm-3 col-form-label">Platelets</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="platelets" name="platelets" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'crp'){
                    if (!crDisp){
                        crDisp = true;
                        document.getElementById("crp").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="crp">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">C~ Reactive Protein (CRP)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="crpval" class="col-sm-3 col-form-label">C~ Reactive Protein</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="crpval" name="crpval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'gue'){
                    if (!guDisp){
                        guDisp = true;

                        strE = "'emoglobina'";
                        strC = "'corpichetonici'";
                        strB = "'bilirubina'";
                        strL = "'leucociti'";

                        document.getElementById("gue").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="gue">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">General Urine Examination (GUE)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="colore" class="col-sm-3 col-form-label">Colore</label>\
                                <div class="col-sm-8">\
                                    <input type="text" class="form-control" id="colore" name="colore" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="aspetto" class="col-sm-3 col-form-label">Aspetto</label>\
                                <div class="col-sm-8">\
                                    <input type="text" class="form-control" id="aspetto" name="aspetto" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="ph" class="col-sm-3 col-form-label">pH</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="ph" name="ph" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="glucosio" class="col-sm-3 col-form-label">Glucosio</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="glucosio" name="glucosio" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="proteine" class="col-sm-3 col-form-label">Proteine</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="proteine" name="proteine" required>\
                                </div>\
                            </div>\
                            \
                            <div class="mb-3 row">\
                                <label for="emoglobina" class="col-sm-3 col-form-label">Emoglobina</label>\
                                <div class="col-sm-1" style="margin-left: 3%">\
                                    <input class="form-check-input" type="radio" name="emoglobina" id="emoglobinaVal" value="si" onchange="showElement('+strE+', this.value);" required>\
                                    <label class="form-check-label" for="emoglobina">Si</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="emoglobina" id="emoglobinaVal" value="no" onchange="showElement('+strE+', this.value);" required>\
                                    <label class="form-check-label" for="emoglobina">No</label>\
                                </div>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" name="emoglobina" id="emoglobina" placeholder="Emoglobina" style="display: none;"/>\
                                </div>\
                            </div>\
                            \
                            <div class="mb-3 row">\
                                <label for="corpichetonici" class="col-sm-3 col-form-label">Corpi chetonici</label>\
                                <div class="col-sm-1" style="margin-left: 3%">\
                                    <input class="form-check-input" type="radio" name="corpichetonici" id="corpichetoniciVal" value="si" onchange="showElement('+strC+', this.value);" required>\
                                    <label class="form-check-label" for="corpichetonici">Si</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="corpichetonici" id="corpichetoniciVal" value="no" onchange="showElement('+strC+', this.value);" required>\
                                    <label class="form-check-label" for="corpichetonici">No</label>\
                                </div>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" name="corpichetonici" id="corpichetonici" placeholder="Corpi chetonici" style="display: none;"/>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="bilirubina" class="col-sm-3 col-form-label">Bilirubina</label>\
                                <div class="col-sm-1" style="margin-left: 3%">\
                                    <input class="form-check-input" type="radio" name="bilirubina" id="bilirubinaVal" value="si" onchange="showElement('+strB+', this.value);" required>\
                                    <label class="form-check-label" for="bilirubina">Si</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="bilirubina" id="bilirubinaVal" value="no" onchange="showElement('+strB+', this.value);" required>\
                                    <label class="form-check-label" for="bilirubina">No</label>\
                                </div>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" name="bilirubina" id="bilirubina" placeholder="Bilirubina" style="display: none;"/>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="urobilinogeno" class="col-sm-3 col-form-label">Urobilinogeno</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="urobilinogeno" name="urobilinogeno" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="leucociti" class="col-sm-3 col-form-label">Leucociti</label>\
                                <div class="col-sm-1" style="margin-left: 3%">\
                                    <input class="form-check-input" type="radio" name="leucociti" id="leucocitiVal" value="si" onchange="showElement('+strL+', this.value);" required>\
                                    <label class="form-check-label" for="leucociti">Si</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="leucociti" id="leucocitiVal" value="no" onchange="showElement('+strL+', this.value);" required>\
                                    <label class="form-check-label" for="leucociti">No</label>\
                                </div>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" name="leucociti" id="leucociti" placeholder="Leucociti" style="display: none;"/>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="creatinina" class="col-sm-3 col-form-label">Creatinina</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="creatinina" name="creatinina" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'pt'){
                    if (!ptDisp){
                        ptDisp = true;
                        document.getElementById("pt").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="pt">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Pregnant Test (PT)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="ptval" class="col-sm-3 col-form-label">Pregnant Test</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="ptval" name="ptval" required>\
                                </div>\
                                <div class="col-sm-1">\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="ptEsito" value="Positivo" required>\
                                    <label class="form-check-label" for="ptEsito">Positivo</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="ptEsito" value="Negativo" required>\
                                    <label class="form-check-label" for="ptEsito">Negativo</label>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'wat'){
                    if (!waDisp){
                        waDisp = true;
                        document.getElementById("wat").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="wat">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Widal Agglutination Test (WAT)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="tyH" class="col-sm-3 col-form-label">Typhi H</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="tyH" name="tyH" placeholder="Typhi H" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="tyO" class="col-sm-3 col-form-label">Typhi O</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="tyO" name="tyO" placeholder="Typhi O" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="patyH" class="col-sm-3 col-form-label">Para Typhi BH</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="patyH" name="patyH" placeholder="Para Typhi BH" required>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="patyO" class="col-sm-3 col-form-label">Para Typhi BO</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="patyO" name="patyO" placeholder="Para Typhi BO" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'bat'){
                    if (!baDisp){
                        baDisp = true;
                        document.getElementById("bat").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="bat">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Brucella Agglutination Test (BAT)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="batval" class="col-sm-3 col-form-label">Brucella Agglutination Test</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="batval" name="batval" required>\
                                </div>\
                                <div class="col-sm-1">\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="batEsito" id="batEsito" value="Positivo" required>\
                                    <label class="form-check-label" for="batEsito">Positivo</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="batEsito" id="batEsito" value="Negativo" required>\
                                    <label class="form-check-label" for="batEsito">Negativo</label>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'hbs'){
                    if (!hbDisp){
                        hbDisp = true;
                        document.getElementById("hbs").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="hbs">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Hepatitis B (HBS)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hbsval" class="col-sm-3 col-form-label">Hepatitis B</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="hbsval" name="hbsval" required>\
                                </div>\
                                <div class="col-sm-1">\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hbsEsito" id="hbsEsito" value="Positivo" required>\
                                    <label class="form-check-label" for="hbsEsito">Positivo</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hbsEsito" id="hbsEsito" value="Negativo" required>\
                                    <label class="form-check-label" for="hbsEsito">Negativo</label>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'hiv'){
                    if (!hiDisp){
                        hiDisp = true;
                        document.getElementById("hiv").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="hiv">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Human immune deficiency virus (HIV)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hivval" class="col-sm-3 col-form-label">Human immune deficiency virus</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="hivval" name="hivval" required>\
                                </div>\
                                <div class="col-sm-1">\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hivEsito" id="hivEsito" value="Positivo" required>\
                                    <label class="form-check-label" for="hivEsito">Positivo</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hivEsito" id="hivEsito" value="Negativo" required>\
                                    <label class="form-check-label" for="hivEsito">Negativo</label>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'hcv'){
                    if (!hcDisp){
                        hcDisp = true;
                        document.getElementById("hcv").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="hcv">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Hepatitis C (HCV)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hcvval" class="col-sm-3 col-form-label">Hepatitis C</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="hcvval" name="hcvval" required>\
                                </div>\
                                <div class="col-sm-1">\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hcvEsito" id="hcvEsito" value="Positivo" required>\
                                    <label class="form-check-label" for="pthcvEsitoEsito">Positivo</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hcvEsito" id="hcvEsito" value="Negativo" required>\
                                    <label class="form-check-label" for="hcvEsito">Negativo</label>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'fbs'){
                    if (!fbDisp){
                        fbDisp = true;
                        document.getElementById("fbs").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="fbs">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Fasting Blood Sugar (FBS)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="fbsval" class="col-sm-3 col-form-label">Fasting Blood Sugar</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="fbsval" name="fbsval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'bg'){
                    if (!bgDisp){
                        bgDisp = true;
                        document.getElementById("bg").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="bg">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Blood group (BG)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="bgval" class="col-sm-3 col-form-label">Blood group</label>\
                                <div class="col-sm-8">\
                                    <select class="form-select" name="bgval" id="bgval" required>\
                                        <option value="">- select -</option>\
                                        <option value="A+">A+</option>\
                                        <option value="A-">A-</option>\
                                        <option value="B+">B+</option>\
                                        <option value="B-">B-</option>\
                                        <option value="AB+">AB+</option>\
                                        <option value="AB-">AB-</option>\
                                        <option value="0+">0+</option>\
                                        <option value="0-">0-</option>\
                                    </select>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'hpylori'){
                    if (!hpDisp){
                        hpDisp = true;
                        document.getElementById("hpylori").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="hpylori">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Helicobacter Pylori (H pylori)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hpylorival" class="col-sm-3 col-form-label">Helicobacter Pylori</label>\
                                <div class="col-sm-5">\
                                    <input type="number" class="form-control" id="hpylorival" name="hpylorival" required>\
                                </div>\
                                <div class="col-sm-1">\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hpyloriEsito" id="hpyloriEsito" value="Positivo" required>\
                                    <label class="form-check-label" for="hpyloriEsito">Positivo</label>\
                                </div>\
                                <div class="col-sm-1">\
                                    <input class="form-check-input" type="radio" name="hpyloriEsito" id="hpyloriEsito" value="Negativo" required>\
                                    <label class="form-check-label" for="hpyloriEsito">Negativo</label>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'cho'){
                    if (!chDisp){
                        chDisp = true;
                        document.getElementById("cho").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="cho">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">Changes in plasma levels of cholesterol (CHO)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="choval" class="col-sm-3 col-form-label">Changes in plasma levels of cholesterol</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="choval" name="choval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'tg'){
                    if (!tgDisp){
                        tgDisp = true;
                        document.getElementById("tg").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="tg">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">triglyceride (TG)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="tgval" class="col-sm-3 col-form-label">triglyceride</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="tgval" name="tgval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'hdl'){
                    if (!hdDisp){
                        hdDisp = true;
                        document.getElementById("hdl").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="hdl">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">high density lipoprotein (HDL)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="hdlval" class="col-sm-3 col-form-label">high density lipoprotein</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="hdlval" name="hdlval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'ldl'){
                    if (!ldDisp){
                        ldDisp = true;
                        document.getElementById("ldl").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="ldl">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">low density lipoprotein (LDL)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="ldlval" class="col-sm-3 col-form-label">low density lipoprotein</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="ldlval" name="ldlval" required>\
                                </div>\
                            </div>';
                    }
                }
                if(val == 'vldl'){
                    if (!vlDisp){
                        vlDisp = true;
                        document.getElementById("vldl").innerHTML = '<hr class="hr" />\
                            <input type="hidden" id="exams" name="exams[]" value="vldl">\
                            <div class="mb-3 row">\
                                <h6 class="col-sm-11">very low density lipoprotein (VLDL)</h6>\
                                <div class="col-sm-1">\
                                    <button type="button" class="btn btn-danger" id="remove" name="remove" onclick="remove('+str+');">−</button>\
                                </div>\
                            </div>\
                            <div class="mb-3 row">\
                                <label for="vldlval" class="col-sm-3 col-form-label">very low density lipoprotein</label>\
                                <div class="col-sm-8">\
                                    <input type="number" class="form-control" id="vldlval" name="vldlval" required>\
                                </div>\
                            </div>';
                    }
                }
            }

            function remove(val){
                if(val == 'esr'){
                    document.getElementById("esr").innerHTML = '';
                    esDisp = false;
                }
                if(val == 'cbc'){
                    document.getElementById("cbc").innerHTML = '';
                    cbDisp = false;
                }
                if(val == 'crp'){
                    document.getElementById("crp").innerHTML = '';
                    crDisp = false;
                }
                if(val == 'gue'){
                    document.getElementById("gue").innerHTML = '';
                    guDisp = false;
                }
                if(val == 'pt'){
                    document.getElementById("pt").innerHTML = '';
                    ptDisp = false;
                }
                if(val == 'wat'){
                    document.getElementById("wat").innerHTML = '';
                    waDisp = false;
                }
                if(val == 'bat'){
                    document.getElementById("bat").innerHTML = '';
                    baDisp = false;
                }
                if(val == 'hbs'){
                    document.getElementById("hbs").innerHTML = '';
                    hbDisp = false;
                }
                if(val == 'hiv'){
                    document.getElementById("hiv").innerHTML = '';
                    hiDisp = false;
                }
                if(val == 'hcv'){
                    document.getElementById("hcv").innerHTML = '';
                    hcDisp = false;
                }
                if(val == 'fbs'){
                    document.getElementById("fbs").innerHTML = '';
                    fbDisp = false;
                }
                if(val == 'bg'){
                    document.getElementById("bg").innerHTML = '';
                    bgDisp = false;
                }
                if(val == 'hpylori'){
                    document.getElementById("hpylori").innerHTML = '';
                    hpDisp = false;
                }
                if(val == 'cho'){
                    document.getElementById("cho").innerHTML = '';
                    chDisp = false;
                }
                if(val == 'tg'){
                    document.getElementById("tg").innerHTML = '';
                    tgDisp = false;
                }
                if(val == 'hdl'){
                    document.getElementById("hdl").innerHTML = '';
                    hdDisp = false;
                }
                if(val == 'ldl'){
                    document.getElementById("ldl").innerHTML = '';
                    ldDisp = false;
                }
                if(val == 'vldl'){
                    document.getElementById("vldl").innerHTML = '';
                    vlDisp = false;
                }
                
            }

            function showElement(idElement, val){
                if(val == 'si'){
                    document.getElementById(idElement).style.display = 'block';
                    document.getElementById(idElement).required = true;
                }
                if(val == 'no'){
                    document.getElementById(idElement).style.display = 'none';
                    document.getElementById(idElement).required = false;
                }
            }


        </script>
    </head>
    <body>
        <?php
            var_dump($_POST);
            $num = $_POST['modificaE'];

            $sql = "SELECT * FROM esame WHERE ID = $num";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $id = $row['id_paziente'];
            $tipo = $row['tipo'];
            $data = $row['data'];

            
            $noteV = $row["note"] ?? '';
            $file_str = $row["filePath"] ?? '';
            $name_str = $row["fileName"] ?? '';
            $ex = $row["ex"] ?? '';
            $file_ar = explode(";",$file_str) ?? '';
            $name_ar = explode(";",$name_str) ?? '';
            $exams = explode(",", $ex) ?? '';



            $esrval = $row['ESR'] ?? '0';

            $redbloodcells = $row['redbc'] ?? '0';
            $whitebloodcells = $row['whitebc'] ?? '0';
            $hemoglobin = $row['hemoglobin'] ?? '0';
            $hematocrit = $row['hematocrit'] ?? '0';
            $platelets = $row['platelets'] ?? '0';

            $crpval = $row['CRP'] ?? '0';

            $colore = $row['colore'] ?? '';
            $aspetto = $row['aspetto'] ?? '';
            $ph = $row['ph'] ?? '0';
            $glucosio = $row['glucosio'] ?? '0';
            $proteine = $row['proteine'] ?? '0';
            $emoglobina = $row['emoglobina'] ?? '0';
            $corpichetonici = $row['corpiChetonici'] ?? '0';
            $bilirubina = $row['bilirubina'] ?? '0';
            $urobilinogeno = $row['urobilinogeno'] ?? '0';
            $leucociti = $row['leucociti'] ?? '0';
            $creatinina = $row['creatinina'] ?? '0';

            $ptval = $row['PTval'] ?? '0';
            $ptEsito = $row['PT'] ?? '';

            $tyH = $row['tyH'] ?? '0';
            $tyO = $row['tyO'] ?? '0';
            $patyH = $row['patyH'] ?? '0';
            $patyO = $row['patyO'] ?? '0';

            $batval = $row['BATval'] ?? '0';
            $batEsito = $row['BAT'] ?? '';

            $hbsval = $row['HBSval'] ?? '0';
            $hbsEsito = $row['HBS'] ?? '';

            $hivval = $row['HIVval'] ?? '0';
            $hivEsito = $row['HIV'] ?? '';

            $hcvval = $row['HCVval'] ?? '0';
            $hcvEsito = $row['HCV'] ?? '';

            $fbsval = $row['FBS'] ?? '0';

            $bgval = $row['BG'] ?? '0';

            $hpylorival = $row['HPYval'] ?? '0';
            $hpyloriEsito = $row['HPY'] ?? '';

            $choval = $row['CHO'] ?? '0';

            $tgval = $row['TG'] ?? '0';

            $hdlval = $row['HDL'] ?? '0';

            $ldlval = $row['LDL'] ?? '0';

            $vldlval = $row['VLDL'] ?? '0';




            
            $total_count = count($file_ar) ??  0;

        ?>

        <nav class="navbar fixed-top navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php" style="color: white; font-size: 24px;"><b>Home</b></a>
                <h2>Nuovo esame - <?php echo $id ?></h2>
                <div class="d-flex">
                    <span class="navbar-text" style="color: white; font-size: 20px; padding-right: 10px;">
                        Nome Utente
                    </span>

                    <button type="button" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </nav>
        
		<a href="javascript:history.go(-1)">
			<button type="button" class="btn btn-secondary" style="margin-left: 5%;margin-bottom: 15px;"><-- Indietro</button>
		</a>
        
        <div class='box'>
            
            <h4>Scegli tipologia esame</h4>
            <br>
            <form action="esame.php?ID=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipologia esame</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="tipo" id="tipo" onchange='setEsame(this.value)'>
                            <option>- select -</option>
                            <option value="el">Esame Laboratorio</option>
                            <option value="ecg">Elettrocardiogramma</option>
                            <option value="rg">Radiografie</option>
                            <option value="eg">Ecografia</option>
                            <option value="tac">TAC</option>
                            <option value="rm">Risonanza Magnetica</option>
                        </select>
                    </div>
                </div>
                <p id='form'></p>

                <div id='el'></div>

                <div id="esLab"></div>

            </form>
        </div>
    </body>
</html>

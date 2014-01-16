<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| Defined by me
|--------------------------------------------------------------------------
|
| These constants are defined by me
|
*/

//~ Profiling
define('PROFILING_CONST',FALSE);

//~ Databases and address
define('BASE_URL_UPC',   '192.168.83.89'); 		 # lab
//~ define('BASE_URL_UPC',   '192.168.83.89'); 	     # para el cluster
define('BASE_URL_CLUSTER',   '/cluster_comtar'); # lab
//~ define('BASE_URL_CLUSTER',   '/cluster_comtar'); # para el cluster
define('PATH_PATMATCH_CLUSTER',   '/home/uciel/lab/programas/patmatch_2013'); #lab
//~ define('PATH_PATMATCH_CLUSTER',   '/home/uchorostecki.ibr/patmatchPro'); # para el cluster


define('MIN_SPECIES',   2);
define('MAX_SPECIES',  10);
define('DEFAULT_PE','72PE');
define('SPECIES_SEPARATOR', '<br>');
define('GU_RULE', '((mm<4) OR (mm=4 AND  gu>0))');
define('DB_search','phytozome');

#define tabs
define('tabEnergy', 'mirnas');
define('tabDescription', 'functional_description');
define('tabFamily', 'gene_families');
# pfam protein domains
//~ define('tabFamily', 'gene_families_pfam');

#define table fields

//~ ############## Debería ser uno o el otro
//~ define('SIMILAR_field', 'similar1');
//~ define('SIMILAR_field', 'similar_osa');
define('SIMILAR_field', 'similar_ath');
define('FAMILY_field', 'family');
//~ Esto es solo para el mir396 que dice phyto al final
//~ define('FAMILY_field', 'family_annotation');

//~ ############## Debería ser uno o el otro

#define links
define('BEG_LINK_WMD3','http://wmd3.weigelworld.org/cgi-bin/webapp.cgi?page=TargetSearch&rm=showsequence&seq_id=');
define('END_LINK_WMD3','&transcript_library=TAIR8_cdna_20080412');

define('BEG_LINK_TAIR','http://www.arabidopsis.org/servlets/Search?type=general&search_action=detail&method=1&show_obsolete=F&name=');
define('END_LINK_TAIR','&sub_type=gene&SEARCH_EXACT=4&SEARCH_CONTAINS=1');

define('PHYTOZOME_LINK','http://phytozome.net/Phytozome_info.php');
//~ define('BEG_LINK_TAIR','http://rice.plantbiology.msu.edu/cgi-bin/ORF_infopage.cgi?orf=');
//~ define('END_LINK_TAIR','');


//~ Help Messages
define('MIRNA_LIST_TITLE', 'miRNA list');
define('MIRNA_LIST_MSG', 'Click to see the complete list of conserved miRNAs');
define('MM_FILTER_TITLE','Mismatch filter');
define('MM_FILTER_MSG','Only one mismatch is allowed between positions 1 and 11 of the miRNA consensus sequence.');
define('MFE_FILTER_TITLE','MFE cutoff');
define('MFE_FILTER_MSG','In kcal/mol (e.g. -26) or as a percentage of the perfect mfe (PE) between miRNA and target  (e.g. 72PE).');
define('SPECIES_FILTER_TITLE','Number of species');
define('SPECIES_FILTER_MSG','Minimum number of species where the same tag is present for a particular miRNA.');
define('ATH_LOCUS_ID_TITLE','Arabidopsi Thaliana locus ID');
define('ATH_LOCUS_ID_MSG','Locus ID (e.g. AT2G22840)');
define('PHYTOZOME_ID_TITLE','Click to see the source of each plant specie');
define('PHYTOZOME_ID_MSG','Gene identifier examples: Bradi1g09900.1 (Brachypodium distachyon), Glyma14g10090.1 (Glycine max), GRMZM2G178261_T05 (Zea mays).');


//~ Targets
define('ATH_TAG_MSG','Candidate sequences were labeled with the locus ID of the best hit in Arabidopsis. Genes from different species having the same tag were grouped together as they have the same homolog gene in A. thaliana.');
define('COUNT_MSG','Number of species where the same tag was present for a particular Arabidopsis locus ID');
define('SPECIES_MSG','Species where the same tag was present for a particular Arabidopsis locus ID');
define('DESCRIPTION_MSG','A brief description of the gene. Usually a brief summary about the gene written by TAIR curators based upon the literature.');
define('FAMILY_MSG','Gene family definition (TAIR).');
define('ALIGMENTS_MSG','Alignments of the miRNA–target pair in each present specie.');
//~ View aligments
define('ALIGNMENT_MSG','MiRNA–target alignment. <br> <font color="red">Red color</font>  means that this alignment does not satisfy the mismatch filter.');
define('MFE_MSG','Minimum free energy (MFE) of the miRNA-target duplex calculated using RNAHybrid.<br> <font color="red">Red color</font>  means that this value is below the MFE filter cut-off.');






//~ free energy compared to a perfectly complementary target

/* End of file constants.php */
/* Location: ./application/config/constants.php */

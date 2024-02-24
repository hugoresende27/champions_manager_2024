<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            ['country_id' => 1, 'code' => 'SLB', 'funding_year' => 1904 , 'name' => 'SL Benfica'],
            ['country_id' => 1, 'code' => 'FCP', 'funding_year' => 1893 , 'name' => 'FC Porto'],
            ['country_id' => 1, 'code' => 'SCP', 'funding_year' => 1906 , 'name' => 'Sporting CP'],
            ['country_id' => 1, 'code' => 'SCB', 'funding_year' => 1921 , 'name' => 'SC Braga'],
            ['country_id' => 1, 'code' => 'VSC', 'funding_year' => 1922 , 'name' => 'Vitória SC'],
            ['country_id' => 1, 'code' => 'BFC', 'funding_year' => 1903 , 'name' => 'Boavista FC'],
            ['country_id' => 1, 'code' => 'PAC', 'funding_year' => 1950 , 'name' => 'FC Paços de Ferreira'],
            ['country_id' => 1, 'code' => 'FAM', 'funding_year' => 1931 , 'name' => 'FC Famalicão'],
            ['country_id' => 1, 'code' => 'MRT', 'funding_year' => 1910 , 'name' => 'Marítimo'],
            ['country_id' => 1, 'code' => 'GVFC', 'funding_year' => 1924 , 'name' => 'Gil Vicente FC'],
            ['country_id' => 1, 'code' => 'PSC', 'funding_year' => 1914 , 'name' => 'Portimonense SC'],
            ['country_id' => 1, 'code' => 'CDSC', 'funding_year' => 1920 , 'name' => 'CD Santa Clara'],
            ['country_id' => 1, 'code' => 'MFC', 'funding_year' => 1938 , 'name' => 'Moreirense FC'],
            ['country_id' => 1, 'code' => 'CDT', 'funding_year' => 1933 , 'name' => 'CD Tondela'],
            ['country_id' => 1, 'code' => 'BSAD', 'funding_year' => 2018 , 'name' => 'Belenenses SAD'],
            ['country_id' => 1, 'code' => 'FCA', 'funding_year' => 1958 , 'name' => 'FC Arouca'],


            ['country_id' => 2, 'code' => 'PSG', 'funding_year' => 1970, 'name' => 'Paris Saint-Germain'],
            ['country_id' => 2, 'code' => 'OM', 'funding_year' => 1899, 'name' => 'Olympique de Marseille'],
            ['country_id' => 2, 'code' => 'OL', 'funding_year' => 1950, 'name' => 'Olympique Lyonnais'],
            ['country_id' => 2, 'code' => 'ASM', 'funding_year' => 1919, 'name' => 'AS Monaco'],
            ['country_id' => 2, 'code' => 'LOSC', 'funding_year' => 1944, 'name' => 'LOSC Lille'],
            ['country_id' => 2, 'code' => 'ASSE', 'funding_year' => 1919, 'name' => 'AS Saint-Étienne'],
            ['country_id' => 2, 'code' => 'SRFC', 'funding_year' => 1901, 'name' => 'Stade Rennais FC'],
            ['country_id' => 2, 'code' => 'FCGB', 'funding_year' => 1881, 'name' => 'Girondins de Bordeaux'],
            ['country_id' => 2, 'code' => 'MHSC', 'funding_year' => 1919, 'name' => 'Montpellier HSC'],
            ['country_id' => 2, 'code' => 'OGCN', 'funding_year' => 1904, 'name' => 'OGC Nice'],
            ['country_id' => 2, 'code' => 'RCSA', 'funding_year' => 1906, 'name' => 'RC Strasbourg Alsace'],
            ['country_id' => 2, 'code' => 'FCM', 'funding_year' => 1919, 'name' => 'FC Metz'],
            ['country_id' => 2, 'code' => 'SCO', 'funding_year' => 1919, 'name' => 'Angers SCO'],
            ['country_id' => 2, 'code' => 'FCN', 'funding_year' => 1943, 'name' => 'FC Nantes'],
            ['country_id' => 2, 'code' => 'SDR', 'funding_year' => 1910, 'name' => 'Stade de Reims'],
            ['country_id' => 2, 'code' => 'DFCO', 'funding_year' => 1998, 'name' => 'Dijon FCO'],
            ['country_id' => 2, 'code' => 'FCL', 'funding_year' => 1926, 'name' => 'FC Lorient'],
            ['country_id' => 2, 'code' => 'RCL', 'funding_year' => 1906, 'name' => 'RC Lens'],
            ['country_id' => 2, 'code' => 'ESTAC', 'funding_year' => 1986, 'name' => 'ESTAC Troyes'],
            ['country_id' => 2, 'code' => 'CF63', 'funding_year' => 1990, 'name' => 'Clermont Foot'],

            ['country_id' => 3, 'code' => 'RMA', 'funding_year' => 1902, 'name' => 'Real Madrid'],
            ['country_id' => 3, 'code' => 'FCB', 'funding_year' => 1899, 'name' => 'FC Barcelona'],
            ['country_id' => 3, 'code' => 'ATM', 'funding_year' => 1903, 'name' => 'Atlético Madrid'],
            ['country_id' => 3, 'code' => 'SEV', 'funding_year' => 1890, 'name' => 'Sevilla FC'],
            ['country_id' => 3, 'code' => 'VCF', 'funding_year' => 1919, 'name' => 'Valencia CF'],
            ['country_id' => 3, 'code' => 'ATH', 'funding_year' => 1898, 'name' => 'Athletic Bilbao'],
            ['country_id' => 3, 'code' => 'VIL', 'funding_year' => 1923, 'name' => 'Villarreal CF'],
            ['country_id' => 3, 'code' => 'BET', 'funding_year' => 1907, 'name' => 'Real Betis'],
            ['country_id' => 3, 'code' => 'RSO', 'funding_year' => 1909, 'name' => 'Real Sociedad'],
            ['country_id' => 3, 'code' => 'ESP', 'funding_year' => 1900, 'name' => 'RCD Espanyol'],
            ['country_id' => 3, 'code' => 'GRA', 'funding_year' => 1931, 'name' => 'Granada CF'],
            ['country_id' => 3, 'code' => 'CEL', 'funding_year' => 1923, 'name' => 'RC Celta de Vigo'],
            ['country_id' => 3, 'code' => 'OSA', 'funding_year' => 1920, 'name' => 'CA Osasuna'],
            ['country_id' => 3, 'code' => 'ALV', 'funding_year' => 1929, 'name' => 'Deportivo Alavés'],
            ['country_id' => 3, 'code' => 'LEV', 'funding_year' => 1909, 'name' => 'Levante UD'],
            ['country_id' => 3, 'code' => 'GET', 'funding_year' => 1944, 'name' => 'Getafe CF'],
            ['country_id' => 3, 'code' => 'CAD', 'funding_year' => 1910, 'name' => 'Cádiz CF'],
            ['country_id' => 3, 'code' => 'EIB', 'funding_year' => 1940, 'name' => 'SD Eibar'],
            ['country_id' => 3, 'code' => 'HUE', 'funding_year' => 1928, 'name' => 'SD Huesca'],
            ['country_id' => 3, 'code' => 'ELC', 'funding_year' => 1923, 'name' => 'Elche CF'],

            ['country_id' => 4, 'code' => 'MUN', 'funding_year' => 1878, 'name' => 'Manchester United'],
            ['country_id' => 4, 'code' => 'MCI', 'funding_year' => 1880, 'name' => 'Manchester City'],
            ['country_id' => 4, 'code' => 'LIV', 'funding_year' => 1892, 'name' => 'Liverpool FC'],
            ['country_id' => 4, 'code' => 'CHE', 'funding_year' => 1905, 'name' => 'Chelsea FC'],
            ['country_id' => 4, 'code' => 'ARS', 'funding_year' => 1886, 'name' => 'Arsenal FC'],
            ['country_id' => 4, 'code' => 'TOT', 'funding_year' => 1882, 'name' => 'Tottenham Hotspur'],
            ['country_id' => 4, 'code' => 'LEI', 'funding_year' => 1884, 'name' => 'Leicester City'],
            ['country_id' => 4, 'code' => 'WHU', 'funding_year' => 1895, 'name' => 'West Ham United'],
            ['country_id' => 4, 'code' => 'MID', 'funding_year' => 1876, 'name' => 'Middlesbrough FC'],
            ['country_id' => 4, 'code' => 'NEW', 'funding_year' => 1892, 'name' => 'Newcastle United'],
            ['country_id' => 4, 'code' => 'EVE', 'funding_year' => 1878, 'name' => 'Everton FC'],
            ['country_id' => 4, 'code' => 'AVL', 'funding_year' => 1874, 'name' => 'Aston Villa'],
            ['country_id' => 4, 'code' => 'CRY', 'funding_year' => 1905, 'name' => 'Crystal Palace'],
            ['country_id' => 4, 'code' => 'SOU', 'funding_year' => 1885, 'name' => 'Southampton FC'],
            ['country_id' => 4, 'code' => 'WOL', 'funding_year' => 1877, 'name' => 'Wolverhampton Wanderers'],
            ['country_id' => 4, 'code' => 'LEED', 'funding_year' => 1919, 'name' => 'Leeds United'],
            ['country_id' => 4, 'code' => 'BHA', 'funding_year' => 1901, 'name' => 'Brighton & Hove Albion'],
            ['country_id' => 4, 'code' => 'BUR', 'funding_year' => 1882, 'name' => 'Burnley FC'],
            ['country_id' => 4, 'code' => 'NOR', 'funding_year' => 1902, 'name' => 'Norwich City'],
            ['country_id' => 4, 'code' => 'BRE', 'funding_year' => 1889, 'name' => 'Brentford FC'],

            ['country_id' => 5, 'code' => 'BVB', 'funding_year' => 1909, 'name' => 'Borussia Dortmund'],
            ['country_id' => 5, 'code' => 'FCB', 'funding_year' => 1900, 'name' => 'FC Bayern Munich'],
            ['country_id' => 5, 'code' => 'BMG', 'funding_year' => 1900, 'name' => 'Borussia Mönchengladbach'],
            ['country_id' => 5, 'code' => 'B04', 'funding_year' => 1904, 'name' => 'Bayer 04 Leverkusen'],
            ['country_id' => 5, 'code' => 'RB', 'funding_year' => 2009, 'name' => 'RB Leipzig'],
            ['country_id' => 5, 'code' => 'VFB', 'funding_year' => 1893, 'name' => 'VfB Stuttgart'],
            ['country_id' => 5, 'code' => 'S04', 'funding_year' => 1904, 'name' => 'FC Schalke 04'],
            ['country_id' => 5, 'code' => 'SVW', 'funding_year' => 1899, 'name' => 'SV Werder Bremen'],
            ['country_id' => 5, 'code' => 'TSG', 'funding_year' => 1899, 'name' => 'TSG 1899 Hoffenheim'],
            ['country_id' => 5, 'code' => 'FCA', 'funding_year' => 1907, 'name' => 'FC Augsburg'],
            ['country_id' => 5, 'code' => 'SCF', 'funding_year' => 1904, 'name' => 'SC Freiburg'],
            ['country_id' => 5, 'code' => 'FCU', 'funding_year' => 1966, 'name' => '1. FC Union Berlin'],
            ['country_id' => 5, 'code' => 'DSC', 'funding_year' => 1905, 'name' => 'DSC Arminia Bielefeld'],
            ['country_id' => 5, 'code' => 'FCN', 'funding_year' => 1900, 'name' => '1. FC Nürnberg'],
            ['country_id' => 5, 'code' => 'SCP', 'funding_year' => 1995, 'name' => 'SC Paderborn 07'],
            ['country_id' => 5, 'code' => 'FCM', 'funding_year' => 1963, 'name' => 'FC Magdeburg'],
            ['country_id' => 5, 'code' => 'HAN', 'funding_year' => 1899, 'name' => 'Hannover 96'],
            ['country_id' => 5, 'code' => 'D98', 'funding_year' => 1899, 'name' => 'SV Darmstadt 98'],
            ['country_id' => 5, 'code' => 'BSC', 'funding_year' => 1892, 'name' => 'Hertha BSC'],
            ['country_id' => 5, 'code' => 'SGE', 'funding_year' => 1899, 'name' => 'Eintracht Frankfurt'],

            ['country_id' => 6, 'code' => 'JUV', 'funding_year' => 1897, 'name' => 'Juventus FC'],
            ['country_id' => 6, 'code' => 'INT', 'funding_year' => 1908, 'name' => 'FC Internazionale Milano'],
            ['country_id' => 6, 'code' => 'MIL', 'funding_year' => 1899, 'name' => 'AC Milan'],
            ['country_id' => 6, 'code' => 'NAP', 'funding_year' => 1926, 'name' => 'SSC Napoli'],
            ['country_id' => 6, 'code' => 'ROM', 'funding_year' => 1927, 'name' => 'AS Roma'],
            ['country_id' => 6, 'code' => 'LAZ', 'funding_year' => 1900, 'name' => 'SS Lazio'],
            ['country_id' => 6, 'code' => 'ATA', 'funding_year' => 1907, 'name' => 'Atalanta BC'],
            ['country_id' => 6, 'code' => 'FIO', 'funding_year' => 1926, 'name' => 'ACF Fiorentina'],
            ['country_id' => 6, 'code' => 'SAS', 'funding_year' => 1920, 'name' => 'Sassuolo Calcio'],
            ['country_id' => 6, 'code' => 'VER', 'funding_year' => 1903, 'name' => 'Hellas Verona FC'],
            ['country_id' => 6, 'code' => 'SPE', 'funding_year' => 1906, 'name' => 'Spezia Calcio'],
            ['country_id' => 6, 'code' => 'BOG', 'funding_year' => 1909, 'name' => 'Bologna FC 1909'],
            ['country_id' => 6, 'code' => 'GEN', 'funding_year' => 1893, 'name' => 'Genoa CFC'],
            ['country_id' => 6, 'code' => 'UDI', 'funding_year' => 1896, 'name' => 'Udinese Calcio'],
            ['country_id' => 6, 'code' => 'SAM', 'funding_year' => 1909, 'name' => 'UC Sampdoria'],
            ['country_id' => 6, 'code' => 'TOR', 'funding_year' => 1906, 'name' => 'Torino FC'],
            ['country_id' => 6, 'code' => 'BEN', 'funding_year' => 1924, 'name' => 'Benevento Calcio'],
            ['country_id' => 6, 'code' => 'SPE', 'funding_year' => 1926, 'name' => 'Spal 2013'],
            ['country_id' => 6, 'code' => 'CRO', 'funding_year' => 1912, 'name' => 'Cagliari Calcio'],
            ['country_id' => 6, 'code' => 'SAL', 'funding_year' => 1907, 'name' => 'Salernitana Calcio 1919']
        
        


        


        
        
        ];

        foreach ($teams as $teamData) {
            Team::create($teamData);
        }
    }
}

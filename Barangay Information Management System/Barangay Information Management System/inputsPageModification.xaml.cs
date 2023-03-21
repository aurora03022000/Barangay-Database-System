using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;
using MySql.Data.MySqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for inputsPageModification.xaml
    /// </summary>
    public partial class inputsPageModification : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String selected;
        String barangay;

        public inputsPageModification()
        {
            InitializeComponent();

            inputCategoryBox.Text = "Purok";

            //displaying purok list in table
            connection.Open();
            string udpateListDataGrid = "SELECT * FROM purokList ORDER BY name";
            SqlCommand udpateListDataGridCMD = new SqlCommand(udpateListDataGrid, connection);
            udpateListDataGridCMD.ExecuteNonQuery();
            SqlDataAdapter udpateListDataGridDA = new SqlDataAdapter(udpateListDataGridCMD);
            DataTable udpateListDataGridDT = new DataTable("purokList");
            udpateListDataGridDA.Fill(udpateListDataGridDT);
            listDataGrid.ItemsSource = udpateListDataGridDT.DefaultView;
            udpateListDataGridDA.Update(udpateListDataGridDT);
            connection.Close();

            connection.Open();
            SqlCommand getBarangayCMD = new SqlCommand();
            getBarangayCMD.Connection = connection;
            getBarangayCMD.CommandText = "SELECT * FROM barangay WHERE barangay_id = 1 ";
            getBarangayCMD.ExecuteNonQuery();

            SqlDataReader getBarangayDR = getBarangayCMD.ExecuteReader();
            if (getBarangayDR.Read())
            {
                barangay = getBarangayDR.GetValue(1).ToString();
                getBarangayDR.Close();
                connection.Close();
            }
        }

         private void delete_member_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRow = listDataGrid.SelectedItem as DataRowView;
            string selectedRow_list_id = getSelectedRow.Row[0].ToString();
            String selectedCategory = inputCategoryBox.Text;

            switch (selectedCategory)
            {
                case "Purok":
                    //deleting purok
                    connection.Open();
                    SqlCommand deletePurokCMD = new SqlCommand();
                    deletePurokCMD.Connection = connection;
                    deletePurokCMD.CommandText = "DELETE FROM purokList WHERE purok_id=@purok_id";
                    deletePurokCMD.Parameters.AddWithValue("@purok_id", selectedRow_list_id);
                    SqlDataAdapter deletePurokDA = new SqlDataAdapter(deletePurokCMD);
                    DataTable deletePurokDT = new DataTable();
                    deletePurokDA.Fill(deletePurokDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridPurok = "SELECT * FROM purokList ORDER BY name";
                    SqlCommand udpateListDataGridPurokCMD = new SqlCommand(udpateListDataGridPurok, connection);
                    udpateListDataGridPurokCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridPurokDA = new SqlDataAdapter(udpateListDataGridPurokCMD);
                    DataTable udpateListDataGridPurokDT = new DataTable("purokList");
                    udpateListDataGridPurokDA.Fill(udpateListDataGridPurokDT);
                    listDataGrid.ItemsSource = udpateListDataGridPurokDT.DefaultView;
                    udpateListDataGridPurokDA.Update(udpateListDataGridPurokDT);
                    connection.Close();

                    MessageBox.Show("Purok had been deleted successfully!");

                    break;

                case "Tribe":
                    //deleting tribe
                    connection.Open();
                    SqlCommand deleteTribeCMD = new SqlCommand();
                    deleteTribeCMD.Connection = connection;
                    deleteTribeCMD.CommandText = "DELETE FROM tribeList WHERE tribe_id=@tribe_id";
                    deleteTribeCMD.Parameters.AddWithValue("@tribe_id", selectedRow_list_id);
                    SqlDataAdapter deleteTribeDA = new SqlDataAdapter(deleteTribeCMD);
                    DataTable deleteTribeDT = new DataTable();
                    deleteTribeDA.Fill(deleteTribeDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridTribe = "SELECT * FROM tribeList ORDER BY name";
                    SqlCommand udpateListDataGridTribeCMD = new SqlCommand(udpateListDataGridTribe, connection);
                    udpateListDataGridTribeCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridTribeDA = new SqlDataAdapter(udpateListDataGridTribeCMD);
                    DataTable udpateListDataGridTribeDT = new DataTable("tribeList");
                    udpateListDataGridTribeDA.Fill(udpateListDataGridTribeDT);
                    listDataGrid.ItemsSource = udpateListDataGridTribeDT.DefaultView;
                    udpateListDataGridTribeDA.Update(udpateListDataGridTribeDT);
                    connection.Close();

                    MessageBox.Show("Tribe had been deleted successfully!");
                    
                    break;

                case "Religion":
                    //deleting religion
                    connection.Open();
                    SqlCommand deleteReligionCMD = new SqlCommand();
                    deleteReligionCMD.Connection = connection;
                    deleteReligionCMD.CommandText = "DELETE FROM religionList WHERE religion_id=@religion_id";
                    deleteReligionCMD.Parameters.AddWithValue("@religion_id", selectedRow_list_id);
                    SqlDataAdapter deleteReligionDA = new SqlDataAdapter(deleteReligionCMD);
                    DataTable deleteReligionDT = new DataTable();
                    deleteReligionDA.Fill(deleteReligionDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridReligion = "SELECT * FROM religionList ORDER BY name";
                    SqlCommand udpateListDataGridReligionCMD = new SqlCommand(udpateListDataGridReligion, connection);
                    udpateListDataGridReligionCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridReligionDA = new SqlDataAdapter(udpateListDataGridReligionCMD);
                    DataTable udpateListDataGridReligionDT = new DataTable("religionList");
                    udpateListDataGridReligionDA.Fill(udpateListDataGridReligionDT);
                    listDataGrid.ItemsSource = udpateListDataGridReligionDT.DefaultView;
                    udpateListDataGridReligionDA.Update(udpateListDataGridReligionDT);
                    connection.Close();

                    MessageBox.Show("Religion had been deleted successfully!");
                    
                    break;

                case "Mother Tounge":
                    //deleting mother tounge
                    connection.Open();
                    SqlCommand deleteMotherToungeCMD = new SqlCommand();
                    deleteMotherToungeCMD.Connection = connection;
                    deleteMotherToungeCMD.CommandText = "DELETE FROM motherToungeList WHERE mothertounge_id=@mothertounge_id";
                    deleteMotherToungeCMD.Parameters.AddWithValue("@mothertounge_id", selectedRow_list_id);
                    SqlDataAdapter deleteMotherToungeDA = new SqlDataAdapter(deleteMotherToungeCMD);
                    DataTable deleteMotherToungeDT = new DataTable();
                    deleteMotherToungeDA.Fill(deleteMotherToungeDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridMotherTounge = "SELECT * FROM motherToungeList ORDER BY name";
                    SqlCommand udpateListDataGridMotherToungeCMD = new SqlCommand(udpateListDataGridMotherTounge, connection);
                    udpateListDataGridMotherToungeCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridMotherToungeDA = new SqlDataAdapter(udpateListDataGridMotherToungeCMD);
                    DataTable udpateListDataGridMotherToungeDT = new DataTable("motherToungeList");
                    udpateListDataGridMotherToungeDA.Fill(udpateListDataGridMotherToungeDT);
                    listDataGrid.ItemsSource = udpateListDataGridMotherToungeDT.DefaultView;
                    udpateListDataGridMotherToungeDA.Update(udpateListDataGridMotherToungeDT);
                    connection.Close();

                    MessageBox.Show("Mother Tounge had been deleted successfully!");
                    
                    break;

                case "House Type":
                    //deleting house type
                    connection.Open();
                    SqlCommand deleteHouseTypeCMD = new SqlCommand();
                    deleteHouseTypeCMD.Connection = connection;
                    deleteHouseTypeCMD.CommandText = "DELETE FROM housetypeList WHERE housetype_id=@housetype_id";
                    deleteHouseTypeCMD.Parameters.AddWithValue("@housetype_id", selectedRow_list_id);
                    SqlDataAdapter deleteHouseTypeDA = new SqlDataAdapter(deleteHouseTypeCMD);
                    DataTable deleteHouseTypeDT = new DataTable();
                    deleteHouseTypeDA.Fill(deleteHouseTypeDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridHouseType = "SELECT * FROM housetypeList ORDER BY name";
                    SqlCommand udpateListDataGridHouseTypeCMD = new SqlCommand(udpateListDataGridHouseType, connection);
                    udpateListDataGridHouseTypeCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridHouseTypeDA = new SqlDataAdapter(udpateListDataGridHouseTypeCMD);
                    DataTable udpateListDataGridHouseTypeDT = new DataTable("housetypeList");
                    udpateListDataGridHouseTypeDA.Fill(udpateListDataGridHouseTypeDT);
                    listDataGrid.ItemsSource = udpateListDataGridHouseTypeDT.DefaultView;
                    udpateListDataGridHouseTypeDA.Update(udpateListDataGridHouseTypeDT);
                    connection.Close();

                    MessageBox.Show("House Type had been deleted successfully!");
                    
                    break;

                case "Sanitary Toilet":
                    //deleting sanitary toilet
                    connection.Open();
                    SqlCommand deleteSanitaryToiletCMD = new SqlCommand();
                    deleteSanitaryToiletCMD.Connection = connection;
                    deleteSanitaryToiletCMD.CommandText = "DELETE FROM sanitaryToiletList WHERE sanitarytoilet_id=@sanitarytoilet_id";
                    deleteSanitaryToiletCMD.Parameters.AddWithValue("@sanitarytoilet_id", selectedRow_list_id);
                    SqlDataAdapter deleteSanitaryToiletDA = new SqlDataAdapter(deleteSanitaryToiletCMD);
                    DataTable deleteSanitaryToiletDT = new DataTable();
                    deleteSanitaryToiletDA.Fill(deleteSanitaryToiletDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridSanitaryToilet = "SELECT * FROM sanitaryToiletList ORDER BY name";
                    SqlCommand udpateListDataGridSanitaryToiletCMD = new SqlCommand(udpateListDataGridSanitaryToilet, connection);
                    udpateListDataGridSanitaryToiletCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridSanitaryToiletDA = new SqlDataAdapter(udpateListDataGridSanitaryToiletCMD);
                    DataTable udpateListDataGridSanitaryToiletDT = new DataTable("sanitaryToiletList");
                    udpateListDataGridSanitaryToiletDA.Fill(udpateListDataGridSanitaryToiletDT);
                    listDataGrid.ItemsSource = udpateListDataGridSanitaryToiletDT.DefaultView;
                    udpateListDataGridSanitaryToiletDA.Update(udpateListDataGridSanitaryToiletDT);
                    connection.Close();

                    MessageBox.Show("Sanitary Toilet had been deleted successfully!");
                    
                    break;

                case "Garbage Disposal":
                    //deleting garbage disposal
                    connection.Open();
                    SqlCommand deleteGarbageDisposalCMD = new SqlCommand();
                    deleteGarbageDisposalCMD.Connection = connection;
                    deleteGarbageDisposalCMD.CommandText = "DELETE FROM garbageDisposalList WHERE garbagedisposal_id=@garbagedisposal_id";
                    deleteGarbageDisposalCMD.Parameters.AddWithValue("@garbagedisposal_id", selectedRow_list_id);
                    SqlDataAdapter deleteGarbageDisposalDA = new SqlDataAdapter(deleteGarbageDisposalCMD);
                    DataTable deleteGarbageDisposalDT = new DataTable();
                    deleteGarbageDisposalDA.Fill(deleteGarbageDisposalDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridGarbageDisposal = "SELECT * FROM garbageDisposalList ORDER BY name";
                    SqlCommand udpateListDataGridGarbageDisposalCMD = new SqlCommand(udpateListDataGridGarbageDisposal, connection);
                    udpateListDataGridGarbageDisposalCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridGarbageDisposalDA = new SqlDataAdapter(udpateListDataGridGarbageDisposalCMD);
                    DataTable udpateListDataGridGarbageDisposalDT = new DataTable("garbageDisposalList");
                    udpateListDataGridGarbageDisposalDA.Fill(udpateListDataGridGarbageDisposalDT);
                    listDataGrid.ItemsSource = udpateListDataGridGarbageDisposalDT.DefaultView;
                    udpateListDataGridGarbageDisposalDA.Update(udpateListDataGridGarbageDisposalDT);
                    connection.Close();

                    MessageBox.Show("Garbage Disposal had been deleted successfully!");
                    
                    break;

                case "Water Source":
                    //deleting Water Source
                    connection.Open();
                    SqlCommand deleteWaterSourceCMD = new SqlCommand();
                    deleteWaterSourceCMD.Connection = connection;
                    deleteWaterSourceCMD.CommandText = "DELETE FROM waterSourceList WHERE watersource_id=@watersource_id";
                    deleteWaterSourceCMD.Parameters.AddWithValue("@watersource_id", selectedRow_list_id);
                    SqlDataAdapter deleteWaterSourceDA = new SqlDataAdapter(deleteWaterSourceCMD);
                    DataTable deleteWaterSourceDT = new DataTable();
                    deleteWaterSourceDA.Fill(deleteWaterSourceDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridWaterSource = "SELECT * FROM waterSourceList ORDER BY name";
                    SqlCommand udpateListDataGridWaterSourceCMD = new SqlCommand(udpateListDataGridWaterSource, connection);
                    udpateListDataGridWaterSourceCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridWaterSourceDA = new SqlDataAdapter(udpateListDataGridWaterSourceCMD);
                    DataTable udpateListDataGridWaterSourceDT = new DataTable("waterSourceList");
                    udpateListDataGridWaterSourceDA.Fill(udpateListDataGridWaterSourceDT);
                    listDataGrid.ItemsSource = udpateListDataGridWaterSourceDT.DefaultView;
                    udpateListDataGridWaterSourceDA.Update(udpateListDataGridWaterSourceDT);
                    connection.Close();

                    MessageBox.Show("Water Source had been deleted successfully!");
                    
                    break;

                case "Homelot Status":
                    //deleting Water Source
                    connection.Open();
                    SqlCommand deleteHomelotStatusCMD = new SqlCommand();
                    deleteHomelotStatusCMD.Connection = connection;
                    deleteHomelotStatusCMD.CommandText = "DELETE FROM homelotStatusList WHERE homelotstatus_id=@homelotstatus_id";
                    deleteHomelotStatusCMD.Parameters.AddWithValue("@homelotstatus_id", selectedRow_list_id);
                    SqlDataAdapter deleteHomelotStatusDA = new SqlDataAdapter(deleteHomelotStatusCMD);
                    DataTable deleteHomelotStatusDT = new DataTable();
                    deleteHomelotStatusDA.Fill(deleteHomelotStatusDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridHomelotStatus = "SELECT * FROM homelotStatusList ORDER BY name";
                    SqlCommand udpateListDataGridHomelotStatusCMD = new SqlCommand(udpateListDataGridHomelotStatus, connection);
                    udpateListDataGridHomelotStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridHomelotStatusDA = new SqlDataAdapter(udpateListDataGridHomelotStatusCMD);
                    DataTable udpateListDataGridHomelotStatusDT = new DataTable("homelotStatusList");
                    udpateListDataGridHomelotStatusDA.Fill(udpateListDataGridHomelotStatusDT);
                    listDataGrid.ItemsSource = udpateListDataGridHomelotStatusDT.DefaultView;
                    udpateListDataGridHomelotStatusDA.Update(udpateListDataGridHomelotStatusDT);
                    connection.Close();

                    MessageBox.Show("Homelot Status had been deleted successfully!");
                   
                    break;

                case "House Status":
                    //deleting Water Source
                    connection.Open();
                    SqlCommand deleteHouseStatusCMD = new SqlCommand();
                    deleteHouseStatusCMD.Connection = connection;
                    deleteHouseStatusCMD.CommandText = "DELETE FROM houseStatusList WHERE housestatus_id=@housestatus_id";
                    deleteHouseStatusCMD.Parameters.AddWithValue("@housestatus_id", selectedRow_list_id);
                    SqlDataAdapter deleteHouseStatusDA = new SqlDataAdapter(deleteHouseStatusCMD);
                    DataTable deleteHouseStatusDT = new DataTable();
                    deleteHouseStatusDA.Fill(deleteHouseStatusDT);
                    connection.Close();

                    //updating list in table
                    connection.Open();
                    string udpateListDataGridHouseStatus = "SELECT * FROM houseStatusList ORDER BY name";
                    SqlCommand udpateListDataGridHouseStatusCMD = new SqlCommand(udpateListDataGridHouseStatus, connection);
                    udpateListDataGridHouseStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridHouseStatusDA = new SqlDataAdapter(udpateListDataGridHouseStatusCMD);
                    DataTable udpateListDataGridHouseStatusDT = new DataTable("houseStatusList");
                    udpateListDataGridHouseStatusDA.Fill(udpateListDataGridHouseStatusDT);
                    listDataGrid.ItemsSource = udpateListDataGridHouseStatusDT.DefaultView;
                    udpateListDataGridHouseStatusDA.Update(udpateListDataGridHouseStatusDT);
                    connection.Close();

                    MessageBox.Show("House Status had been deleted successfully!");
                    
                    break;

                default:
                    break;
            }
        }

        private void InputCategoryBox_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            selected = (((sender as ComboBox).SelectedValue) as ComboBoxItem).Content.ToString();

            switch (selected)
            {
                case "Purok":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridPurok = "SELECT * FROM purokList ORDER BY name";
                    SqlCommand udpateListDataGridPurokCMD = new SqlCommand(udpateListDataGridPurok, connection);
                    udpateListDataGridPurokCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridPurokDA = new SqlDataAdapter(udpateListDataGridPurokCMD);
                    DataTable udpateListDataGridPurokDT = new DataTable("purokList");
                    udpateListDataGridPurokDA.Fill(udpateListDataGridPurokDT);
                    listDataGrid.ItemsSource = udpateListDataGridPurokDT.DefaultView;
                    udpateListDataGridPurokDA.Update(udpateListDataGridPurokDT);
                    connection.Close();
                    break;

                case "Tribe":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridTribe = "SELECT * FROM tribeList ORDER BY name";
                    SqlCommand udpateListDataGridTribeCMD = new SqlCommand(udpateListDataGridTribe, connection);
                    udpateListDataGridTribeCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridTribeDA = new SqlDataAdapter(udpateListDataGridTribeCMD);
                    DataTable udpateListDataGridTribeDT = new DataTable("tribeList");
                    udpateListDataGridTribeDA.Fill(udpateListDataGridTribeDT);
                    listDataGrid.ItemsSource = udpateListDataGridTribeDT.DefaultView;
                    udpateListDataGridTribeDA.Update(udpateListDataGridTribeDT);
                    connection.Close();
                    break;

                case "Religion":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridReligion = "SELECT * FROM religionList ORDER BY name";
                    SqlCommand udpateListDataGridReligionCMD = new SqlCommand(udpateListDataGridReligion, connection);
                    udpateListDataGridReligionCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridReligionDA = new SqlDataAdapter(udpateListDataGridReligionCMD);
                    DataTable udpateListDataGridReligionDT = new DataTable("religionList");
                    udpateListDataGridReligionDA.Fill(udpateListDataGridReligionDT);
                    listDataGrid.ItemsSource = udpateListDataGridReligionDT.DefaultView;
                    udpateListDataGridReligionDA.Update(udpateListDataGridReligionDT);
                    connection.Close();
                    break;

                case "Mother Tounge":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridMotherTounge = "SELECT * FROM motherToungeList ORDER BY name";
                    SqlCommand udpateListDataGridMotherToungeCMD = new SqlCommand(udpateListDataGridMotherTounge, connection);
                    udpateListDataGridMotherToungeCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridMotherToungeDA = new SqlDataAdapter(udpateListDataGridMotherToungeCMD);
                    DataTable udpateListDataGridMotherToungeDT = new DataTable("motherToungeList");
                    udpateListDataGridMotherToungeDA.Fill(udpateListDataGridMotherToungeDT);
                    listDataGrid.ItemsSource = udpateListDataGridMotherToungeDT.DefaultView;
                    udpateListDataGridMotherToungeDA.Update(udpateListDataGridMotherToungeDT);
                    connection.Close();
                    break;

                case "House Type":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridHouseType = "SELECT * FROM housetypeList ORDER BY name";
                    SqlCommand udpateListDataGridHouseTypeCMD = new SqlCommand(udpateListDataGridHouseType, connection);
                    udpateListDataGridHouseTypeCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridHouseTypeDA = new SqlDataAdapter(udpateListDataGridHouseTypeCMD);
                    DataTable udpateListDataGridHouseTypeDT = new DataTable("housetypeList");
                    udpateListDataGridHouseTypeDA.Fill(udpateListDataGridHouseTypeDT);
                    listDataGrid.ItemsSource = udpateListDataGridHouseTypeDT.DefaultView;
                    udpateListDataGridHouseTypeDA.Update(udpateListDataGridHouseTypeDT);
                    connection.Close();
                    break;

                case "Sanitary Toilet":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridSanitaryToilet = "SELECT * FROM sanitaryToiletList ORDER BY name";
                    SqlCommand udpateListDataGridSanitaryToiletCMD = new SqlCommand(udpateListDataGridSanitaryToilet, connection);
                    udpateListDataGridSanitaryToiletCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridSanitaryToiletDA = new SqlDataAdapter(udpateListDataGridSanitaryToiletCMD);
                    DataTable udpateListDataGridSanitaryToiletDT = new DataTable("sanitaryToiletList");
                    udpateListDataGridSanitaryToiletDA.Fill(udpateListDataGridSanitaryToiletDT);
                    listDataGrid.ItemsSource = udpateListDataGridSanitaryToiletDT.DefaultView;
                    udpateListDataGridSanitaryToiletDA.Update(udpateListDataGridSanitaryToiletDT);
                    connection.Close();
                    break;

                case "Garbage Disposal":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridGarbageDisposal = "SELECT * FROM garbageDisposalList ORDER BY name";
                    SqlCommand udpateListDataGridGarbageDisposalCMD = new SqlCommand(udpateListDataGridGarbageDisposal, connection);
                    udpateListDataGridGarbageDisposalCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridGarbageDisposalDA = new SqlDataAdapter(udpateListDataGridGarbageDisposalCMD);
                    DataTable udpateListDataGridGarbageDisposalDT = new DataTable("garbageDisposalList");
                    udpateListDataGridGarbageDisposalDA.Fill(udpateListDataGridGarbageDisposalDT);
                    listDataGrid.ItemsSource = udpateListDataGridGarbageDisposalDT.DefaultView;
                    udpateListDataGridGarbageDisposalDA.Update(udpateListDataGridGarbageDisposalDT);
                    connection.Close();
                    break;

                case "Water Source":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridWaterSource = "SELECT * FROM waterSourceList ORDER BY name";
                    SqlCommand udpateListDataGridWaterSourceCMD = new SqlCommand(udpateListDataGridWaterSource, connection);
                    udpateListDataGridWaterSourceCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridWaterSourceDA = new SqlDataAdapter(udpateListDataGridWaterSourceCMD);
                    DataTable udpateListDataGridWaterSourceDT = new DataTable("waterSourceList");
                    udpateListDataGridWaterSourceDA.Fill(udpateListDataGridWaterSourceDT);
                    listDataGrid.ItemsSource = udpateListDataGridWaterSourceDT.DefaultView;
                    udpateListDataGridWaterSourceDA.Update(udpateListDataGridWaterSourceDT);
                    connection.Close();
                    break;

                case "Homelot Status":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridHomelotStatus = "SELECT * FROM homelotStatusList ORDER BY name";
                    SqlCommand udpateListDataGridHomelotStatusCMD = new SqlCommand(udpateListDataGridHomelotStatus, connection);
                    udpateListDataGridHomelotStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridHomelotStatusDA = new SqlDataAdapter(udpateListDataGridHomelotStatusCMD);
                    DataTable udpateListDataGridHomelotStatusDT = new DataTable("homelotStatusList");
                    udpateListDataGridHomelotStatusDA.Fill(udpateListDataGridHomelotStatusDT);
                    listDataGrid.ItemsSource = udpateListDataGridHomelotStatusDT.DefaultView;
                    udpateListDataGridHomelotStatusDA.Update(udpateListDataGridHomelotStatusDT);
                    connection.Close();
                    break;

                case "House Status":
                    //updating list in table
                    connection.Open();
                    string udpateListDataGridHouseStatus = "SELECT * FROM houseStatusList ORDER BY name";
                    SqlCommand udpateListDataGridHouseStatusCMD = new SqlCommand(udpateListDataGridHouseStatus, connection);
                    udpateListDataGridHouseStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter udpateListDataGridHouseStatusDA = new SqlDataAdapter(udpateListDataGridHouseStatusCMD);
                    DataTable udpateListDataGridHouseStatusDT = new DataTable("houseStatusList");
                    udpateListDataGridHouseStatusDA.Fill(udpateListDataGridHouseStatusDT);
                    listDataGrid.ItemsSource = udpateListDataGridHouseStatusDT.DefaultView;
                    udpateListDataGridHouseStatusDA.Update(udpateListDataGridHouseStatusDT);
                    connection.Close();
                    break;

                default:
                    break;
            }
        }

        private void Addvalue_Click(object sender, RoutedEventArgs e)
        {
            if(value.Text == "")
            {
                MessageBox.Show(this, "Value field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                value.BorderBrush = Brushes.Red;
                value.Focus();
            }

            else
            {
                switch (inputCategoryBox.Text)
                {
                    case "Purok":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewPurokCMD = new SqlCommand();
                        insertNewPurokCMD.Connection = connection;
                        insertNewPurokCMD.CommandText = "INSERT INTO purokList(name, barangay) VALUES(@value, @barangay)";
                        insertNewPurokCMD.Parameters.AddWithValue("@value", value.Text);
                        insertNewPurokCMD.Parameters.AddWithValue("@barangay", barangay);
                        SqlDataAdapter insertNewPurokDA = new SqlDataAdapter(insertNewPurokCMD);
                        DataTable insertNewPurokDT = new DataTable();
                        insertNewPurokDA.Fill(insertNewPurokDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridPurok = "SELECT * FROM purokList ORDER BY name";
                        SqlCommand udpateListDataGridPurokCMD = new SqlCommand(udpateListDataGridPurok, connection);
                        udpateListDataGridPurokCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridPurokDA = new SqlDataAdapter(udpateListDataGridPurokCMD);
                        DataTable udpateListDataGridPurokDT = new DataTable("purokList");
                        udpateListDataGridPurokDA.Fill(udpateListDataGridPurokDT);
                        listDataGrid.ItemsSource = udpateListDataGridPurokDT.DefaultView;
                        udpateListDataGridPurokDA.Update(udpateListDataGridPurokDT);
                        connection.Close();

                        MessageBox.Show("New Purok had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Tribe":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewTribeCMD = new SqlCommand();
                        insertNewTribeCMD.Connection = connection;
                        insertNewTribeCMD.CommandText = "INSERT INTO tribeList(name) VALUES(@value)";
                        insertNewTribeCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewTribeDA = new SqlDataAdapter(insertNewTribeCMD);
                        DataTable insertNewTribeDT = new DataTable();
                        insertNewTribeDA.Fill(insertNewTribeDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridTribe = "SELECT * FROM tribeList ORDER BY name";
                        SqlCommand udpateListDataGridTribeCMD = new SqlCommand(udpateListDataGridTribe, connection);
                        udpateListDataGridTribeCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridTribeDA = new SqlDataAdapter(udpateListDataGridTribeCMD);
                        DataTable udpateListDataGridTribeDT = new DataTable("tribeList");
                        udpateListDataGridTribeDA.Fill(udpateListDataGridTribeDT);
                        listDataGrid.ItemsSource = udpateListDataGridTribeDT.DefaultView;
                        udpateListDataGridTribeDA.Update(udpateListDataGridTribeDT);
                        connection.Close();

                        MessageBox.Show("New Tribe had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Religion":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewReligionCMD = new SqlCommand();
                        insertNewReligionCMD.Connection = connection;
                        insertNewReligionCMD.CommandText = "INSERT INTO religionList(name) VALUES(@value)";
                        insertNewReligionCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewReligionDA = new SqlDataAdapter(insertNewReligionCMD);
                        DataTable insertNewReligionDT = new DataTable();
                        insertNewReligionDA.Fill(insertNewReligionDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridReligion = "SELECT * FROM religionList ORDER BY name";
                        SqlCommand udpateListDataGridReligionCMD = new SqlCommand(udpateListDataGridReligion, connection);
                        udpateListDataGridReligionCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridReligionDA = new SqlDataAdapter(udpateListDataGridReligionCMD);
                        DataTable udpateListDataGridReligionDT = new DataTable("religionList");
                        udpateListDataGridReligionDA.Fill(udpateListDataGridReligionDT);
                        listDataGrid.ItemsSource = udpateListDataGridReligionDT.DefaultView;
                        udpateListDataGridReligionDA.Update(udpateListDataGridReligionDT);
                        connection.Close();

                        MessageBox.Show("New Religion had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Mother Tounge":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewMotherToungeCMD = new SqlCommand();
                        insertNewMotherToungeCMD.Connection = connection;
                        insertNewMotherToungeCMD.CommandText = "INSERT INTO motherToungeList(name) VALUES(@value)";
                        insertNewMotherToungeCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewMotherToungeDA = new SqlDataAdapter(insertNewMotherToungeCMD);
                        DataTable insertNewMotherToungeDT = new DataTable();
                        insertNewMotherToungeDA.Fill(insertNewMotherToungeDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridMotherTounge = "SELECT * FROM motherToungeList ORDER BY name";
                        SqlCommand udpateListDataGridMotherToungeCMD = new SqlCommand(udpateListDataGridMotherTounge, connection);
                        udpateListDataGridMotherToungeCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridMotherToungeDA = new SqlDataAdapter(udpateListDataGridMotherToungeCMD);
                        DataTable udpateListDataGridMotherToungeDT = new DataTable("motherToungeList");
                        udpateListDataGridMotherToungeDA.Fill(udpateListDataGridMotherToungeDT);
                        listDataGrid.ItemsSource = udpateListDataGridMotherToungeDT.DefaultView;
                        udpateListDataGridMotherToungeDA.Update(udpateListDataGridMotherToungeDT);
                        connection.Close();

                        MessageBox.Show("New Mother Tounge had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "House Type":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewHouseTypeCMD = new SqlCommand();
                        insertNewHouseTypeCMD.Connection = connection;
                        insertNewHouseTypeCMD.CommandText = "INSERT INTO housetypeList(name) VALUES(@value)";
                        insertNewHouseTypeCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewHouseTypeDA = new SqlDataAdapter(insertNewHouseTypeCMD);
                        DataTable insertNewHouseTypeDT = new DataTable();
                        insertNewHouseTypeDA.Fill(insertNewHouseTypeDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridHouseType = "SELECT * FROM housetypeList ORDER BY name";
                        SqlCommand udpateListDataGridHouseTypeCMD = new SqlCommand(udpateListDataGridHouseType, connection);
                        udpateListDataGridHouseTypeCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridHouseTypeDA = new SqlDataAdapter(udpateListDataGridHouseTypeCMD);
                        DataTable udpateListDataGridHouseTypeDT = new DataTable("housetypeList");
                        udpateListDataGridHouseTypeDA.Fill(udpateListDataGridHouseTypeDT);
                        listDataGrid.ItemsSource = udpateListDataGridHouseTypeDT.DefaultView;
                        udpateListDataGridHouseTypeDA.Update(udpateListDataGridHouseTypeDT);
                        connection.Close();

                        MessageBox.Show("New House Type had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Sanitary Toilet":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewSanitaryToiletCMD = new SqlCommand();
                        insertNewSanitaryToiletCMD.Connection = connection;
                        insertNewSanitaryToiletCMD.CommandText = "INSERT INTO sanitaryToiletList(name) VALUES(@value)";
                        insertNewSanitaryToiletCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewSanitaryToiletDA = new SqlDataAdapter(insertNewSanitaryToiletCMD);
                        DataTable insertNewSanitaryToiletDT = new DataTable();
                        insertNewSanitaryToiletDA.Fill(insertNewSanitaryToiletDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridSanitaryToilet = "SELECT * FROM sanitaryToiletList ORDER BY name";
                        SqlCommand udpateListDataGridSanitaryToiletCMD = new SqlCommand(udpateListDataGridSanitaryToilet, connection);
                        udpateListDataGridSanitaryToiletCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridSanitaryToiletDA = new SqlDataAdapter(udpateListDataGridSanitaryToiletCMD);
                        DataTable udpateListDataGridSanitaryToiletDT = new DataTable("sanitaryToiletList");
                        udpateListDataGridSanitaryToiletDA.Fill(udpateListDataGridSanitaryToiletDT);
                        listDataGrid.ItemsSource = udpateListDataGridSanitaryToiletDT.DefaultView;
                        udpateListDataGridSanitaryToiletDA.Update(udpateListDataGridSanitaryToiletDT);
                        connection.Close();

                        MessageBox.Show("New Sanitary Toilet had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Garbage Disposal":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewGarbageDisposalCMD = new SqlCommand();
                        insertNewGarbageDisposalCMD.Connection = connection;
                        insertNewGarbageDisposalCMD.CommandText = "INSERT INTO garbageDisposalList(name) VALUES(@value)";
                        insertNewGarbageDisposalCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewGarbageDisposalDA = new SqlDataAdapter(insertNewGarbageDisposalCMD);
                        DataTable insertNewGarbageDisposalDT = new DataTable();
                        insertNewGarbageDisposalDA.Fill(insertNewGarbageDisposalDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridGarbageDisposal = "SELECT * FROM garbageDisposalList ORDER BY name";
                        SqlCommand udpateListDataGridGarbageDisposalCMD = new SqlCommand(udpateListDataGridGarbageDisposal, connection);
                        udpateListDataGridGarbageDisposalCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridGarbageDisposalDA = new SqlDataAdapter(udpateListDataGridGarbageDisposalCMD);
                        DataTable udpateListDataGridGarbageDisposalDT = new DataTable("garbageDisposalList");
                        udpateListDataGridGarbageDisposalDA.Fill(udpateListDataGridGarbageDisposalDT);
                        listDataGrid.ItemsSource = udpateListDataGridGarbageDisposalDT.DefaultView;
                        udpateListDataGridGarbageDisposalDA.Update(udpateListDataGridGarbageDisposalDT);
                        connection.Close();

                        MessageBox.Show("New Garbage Disposal had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Water Source":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewWaterSourceCMD = new SqlCommand();
                        insertNewWaterSourceCMD.Connection = connection;
                        insertNewWaterSourceCMD.CommandText = "INSERT INTO waterSourceList(name) VALUES(@value)";
                        insertNewWaterSourceCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewWaterSourceDA = new SqlDataAdapter(insertNewWaterSourceCMD);
                        DataTable insertNewWaterSourceDT = new DataTable();
                        insertNewWaterSourceDA.Fill(insertNewWaterSourceDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridWaterSource = "SELECT * FROM waterSourceList ORDER BY name";
                        SqlCommand udpateListDataGridWaterSourceCMD = new SqlCommand(udpateListDataGridWaterSource, connection);
                        udpateListDataGridWaterSourceCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridWaterSourceDA = new SqlDataAdapter(udpateListDataGridWaterSourceCMD);
                        DataTable udpateListDataGridWaterSourceDT = new DataTable("waterSourceList");
                        udpateListDataGridWaterSourceDA.Fill(udpateListDataGridWaterSourceDT);
                        listDataGrid.ItemsSource = udpateListDataGridWaterSourceDT.DefaultView;
                        udpateListDataGridWaterSourceDA.Update(udpateListDataGridWaterSourceDT);
                        connection.Close();

                        MessageBox.Show("New Water Source had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "Homelot Status":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewHomelotStatusCMD = new SqlCommand();
                        insertNewHomelotStatusCMD.Connection = connection;
                        insertNewHomelotStatusCMD.CommandText = "INSERT INTO homelotStatusList(name) VALUES(@value)";
                        insertNewHomelotStatusCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewHomelotStatusDA = new SqlDataAdapter(insertNewHomelotStatusCMD);
                        DataTable insertNewHomelotStatusDT = new DataTable();
                        insertNewHomelotStatusDA.Fill(insertNewHomelotStatusDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridHomelotStatus = "SELECT * FROM homelotStatusList ORDER BY name";
                        SqlCommand udpateListDataGridHomelotStatusCMD = new SqlCommand(udpateListDataGridHomelotStatus, connection);
                        udpateListDataGridHomelotStatusCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridHomelotStatusDA = new SqlDataAdapter(udpateListDataGridHomelotStatusCMD);
                        DataTable udpateListDataGridHomelotStatusDT = new DataTable("homelotStatusList");
                        udpateListDataGridHomelotStatusDA.Fill(udpateListDataGridHomelotStatusDT);
                        listDataGrid.ItemsSource = udpateListDataGridHomelotStatusDT.DefaultView;
                        udpateListDataGridHomelotStatusDA.Update(udpateListDataGridHomelotStatusDT);
                        connection.Close();

                        MessageBox.Show("New Homelot Status had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    case "House Status":
                        //Inserting new purok to purokList table
                        connection.Open();
                        SqlCommand insertNewHouseStatusCMD = new SqlCommand();
                        insertNewHouseStatusCMD.Connection = connection;
                        insertNewHouseStatusCMD.CommandText = "INSERT INTO houseStatusList(name) VALUES(@value)";
                        insertNewHouseStatusCMD.Parameters.AddWithValue("@value", value.Text);
                        SqlDataAdapter insertNewHouseStatusDA = new SqlDataAdapter(insertNewHouseStatusCMD);
                        DataTable insertNewHouseStatusDT = new DataTable();
                        insertNewHouseStatusDA.Fill(insertNewHouseStatusDT);
                        connection.Close();

                        //updating list in table
                        connection.Open();
                        string udpateListDataGridHouseStatus = "SELECT * FROM houseStatusList ORDER BY name";
                        SqlCommand udpateListDataGridHouseStatusCMD = new SqlCommand(udpateListDataGridHouseStatus, connection);
                        udpateListDataGridHouseStatusCMD.ExecuteNonQuery();
                        SqlDataAdapter udpateListDataGridHouseStatusDA = new SqlDataAdapter(udpateListDataGridHouseStatusCMD);
                        DataTable udpateListDataGridHouseStatusDT = new DataTable("houseStatusList");
                        udpateListDataGridHouseStatusDA.Fill(udpateListDataGridHouseStatusDT);
                        listDataGrid.ItemsSource = udpateListDataGridHouseStatusDT.DefaultView;
                        udpateListDataGridHouseStatusDA.Update(udpateListDataGridHouseStatusDT);
                        connection.Close();

                        MessageBox.Show("New House Status had been added successfully!");

                        value.Text = "";
                        value.BorderBrush = Brushes.DarkGray;
                        value.Focus();

                        break;

                    default:
                        break;
                }
            }
            
        }
    }
}
